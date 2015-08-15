<?php namespace Cfair\Repositories;

use Cfair\ConversionMessage;
use Cfair\Interfaces\ConversionMessageInterface;
use PhpSpec\Exception\Exception;


class ConversionMessageRepository implements ConversionMessageInterface
{

    private $data;
    private $forbiddenError = 400;
    private $noErrorSuccess = 200;
    private $statusCode;
    private $response;

    public function __construct()
    {
        $this->data = new ConversionMessage();
    }

    /**
     * get All record
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        try {
            $this->statusCode = $this->noErrorSuccess;
            $this->response = $this->data->all();
        } catch ( Exception $e ) {
            $this->statusCode = $this->forbiddenError;
        } finally {
            return [ $this->response, $this->statusCode ];
        }
    }

    /**
     * Find byId
     *
     * @param $id
     *
     * @return array
     */
    public function find($id)
    {
        try {
            $this->statusCode = $this->noErrorSuccess;
            $this->response = $this->data->find($id);
        } catch ( Exception $e ) {
            $this->statusCode = $this->forbiddenError;
        } finally {
            return [ $this->response, $this->statusCode ];
        }

    }

    /**
     * Find user by userID
     *
     * @param $userID
     *
     * @return array
     */
    public function findByUserId($userID)
    {
        try {
            $this->statusCode = $this->noErrorSuccess;
            $this->data = $this->data->where('userId', '=', $userID)->get();
        } catch ( Exception $e ) {
            $this->statusCode = $this->forbiddenError;
        } finally {
            return [ $this->data, $this->statusCode ];
        }

    }
    
    /**
     * @param $sell
     * @param $buy
     *
     * @return array|bool
     */
    public function sellOrBuy($sell, $buy)
    {
        if ( !empty($sell) && !empty($buy) ||
            empty($sell) && empty($buy)
        ) {
            return false;
        } elseif ( !empty($sell) && empty($buy) ) {
            return [ ];
        } elseif ( !empty($sell) && empty($buy) ) {
            return [ ];
        } else {
            return false;
        }

    }

    /**
     * If we testing we provide a default Remote Address
     *
     * @return string
     */
    public function getIP()
    {
        if ( !empty($_SERVER['REMOTE_ADDR']) ) {
            return geoip_country_code_by_name($_SERVER['REMOTE_ADDR']);
        }

        return $this->data->defaultIP;
    }


    /**
     * @param $input
     *
     * @return array
     */
    public function create($input)
    {

        if ( $this->data->validate($input) ) {
            foreach ( $input as $fields => $value ) {
                $this->data->$fields = $value;
            }

            if ( !empty($input['amountSell']) && !empty($input['amountBuy']) ) {
                $this->statusCode = $this->forbiddenError;
                $errors = $this->data->ruleSellAndBuyFilled();

                return [ $errors, $this->statusCode ];

            } elseif ( !empty($input['amountSell']) && empty($input['amountBuy']) ) {
                $this->data->amountSell = $input['amountSell'];
                $this->data->is_sell = true;
                $base = $this->data->amountSell;
                $this->data->conversion = $this->data->setSellConversion($base, $this->data->rate);
            } elseif ( empty($input['amountSell']) && !empty($input['amountBuy']) ) {

                $this->data->amountBuy = $input['amountBuy'];
                $this->data->is_sell = false;
                $base = $this->data->amountBuy;
                $this->data->conversion = $this->data->setBuyConversion($base, $this->data->rate);
            } else {
                $this->statusCode = $this->forbiddenError;
                $errors = $this->data->ruleSellAndBuyUnknown();

                return [ $errors, $this->statusCode ];
            }
            $this->data->originatingCountry = $this->getIP();
            $this->data->timePlaced = $this->data->setTimePlaced($input['timePlaced']);
            \DB::beginTransaction();
            if ( $this->data->save() ) {
                $this->statusCode = $this->noErrorSuccess;
                \DB::commit();
                return [ $this->data, $this->statusCode ];
            }

            \DB::rollback();
            $this->statusCode = $this->forbiddenError;
            return [ $this->data, $this->statusCode ];

        } else {
            $this->statusCode = $this->forbiddenError;
            $errors = $this->data->errors();

            return [ $errors, $this->statusCode ];
        }

    }
}