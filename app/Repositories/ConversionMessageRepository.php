<?php namespace Cfair\Repositories;

use Cfair\ConversionMessage;
use Cfair\Interfaces\ConversionMessageInterface;
use PhpSpec\Exception\Exception;


class ConversionMessageRepository implements ConversionMessageInterface
{

    private $data;
    private $rules = [
        'userId' => 'integer',
        'currencyFrom' => 'required|max:3|min:3',
        'currencyTo' => 'required|max:3|min:3',
        'amountSell' => 'sometimes|required|numeric',
        'amountBuy' => 'sometimes|required|numeric',
        'rate' => '',
        'timePlaced' => 'date_format:y-M-d H:i:s',
        'originatingCountry' => 'required|min:2|max:2',
    ];

    /**
     * get All record
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        try {
            $statusCode = 200;
            $this->data = ConversionMessage::all();
        } catch ( Exception $e ) {
            $statusCode = 400;
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
            $statusCode = 200;
            $this->data = ConversionMessage::find($id);
        } catch ( Exception $e ) {
            $statusCode = 400;
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
            $statusCode = 200;
            $this->data = ConversionMessage::where('userId', '=', $userID)->get();
        } catch ( Exception $e ) {
            $statusCode = 400;
        } finally {
            return [ $this->data, $statusCode ];
        }

    }

    private function validate($data)
    {

        $v = \Validator::make($data, $this->rules);
        if ( $v->passes() ) {
            return true;
        }
        $this->errors = $v->messages();

        return false;

    }

    public function create($input)
    {
//        $validation = $this->validate($input);
//
//        if($validation){
//
//        }
        $this->data = new ConversionMessage();
        $this->data->userId = $input['userId'];
        $this->data->currencyFrom = $input['currencyFrom'];
        $this->data->currencyTo = $input['currencyTo'];
        if ( !empty($input['amountSell']) ) {
            $this->data->amountSell = $input['amountSell'];
        }
        if ( !empty($input['amountBuy']) ) {
            $this->data->amountBuy = $input['amountBuy'];
        }
        $this->data->rate = $input['rate'];
        $this->data->timePlaced = $input['timePlaced'];
        $this->data->originatingCountry = $input['originatingCountry'];
        if ( $this->data->save() ) {
            $statusCode = 200;

            return [ $this->data, $statusCode ];
        }

        $statusCode = 400;

        return [ $this->data, $statusCode ];

    }

}