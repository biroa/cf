<?php namespace Cfair\Repositories;

use Cfair\ConversionMessage;
use Cfair\Interfaces\ConversionMessageInterface;
use PhpSpec\Exception\Exception;

class ConversionMessageRepository implements ConversionMessageInterface
{

    private $data;
    protected $forbiddenError = 400;
    protected $noErrorSuccess = 200;

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
            $statusCode = $this->noErrorSuccess;

            $this->data->all();
        } catch ( Exception $e ) {
            $statusCode = $this->forbiddenError;
        } finally {
            return [ $this->data, $statusCode ];
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
            $statusCode = $this->noErrorSuccess;
            $this->data->find($id);
        } catch ( Exception $e ) {
            $statusCode = $this->forbiddenError;
        } finally {
            return [ $this->data, $statusCode ];
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
            $statusCode = $this->noErrorSuccess;
            $this->data = $this->data->where('userId', '=', $userID)->get();
        } catch ( Exception $e ) {
            $statusCode = $this->forbiddenError;
        } finally {
            return [ $this->data, $statusCode ];
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

            $this->data->originatingCountry = $this->getIP();
            if ( !empty($input['amountSell']) && !empty($input['amountBuy']) ) {
                $statusCode = $this->forbiddenError;
                $errors = $this->data->ruleSellAndBuyFilled();

                return [ $errors, $statusCode ];

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
                $statusCode = $this->forbiddenError;
                $errors = $this->data->ruleSellAndBuyUnknown();

                return [ $errors, $statusCode ];
            }

            $this->data->timePlaced = $this->data->setTimePlaced($input['timePlaced']);
            \DB::beginTransaction();
            if ( $this->data->save() ) {
                $statusCode = $this->noErrorSuccess;
                \DB::commit();
                return [ $this->data, $statusCode ];
            }

            \DB::rollback();
            $statusCode = $this->forbiddenError;
            return [ $this->data, $statusCode ];

        } else {
            $statusCode = $this->forbiddenError;
            $errors = $this->data->errors();

            return [ $errors, $statusCode ];
        }

    }
}