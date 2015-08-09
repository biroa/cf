<?php namespace Cfair\Repositories;

use Cfair\Interfaces\ConversionMessageInterface;
use Cfair\ConversionMessage;
use Illuminate\Contracts\Auth\Guard;


class ConversionMessageRepository implements ConversionMessageInterface{


    private $rules = [
        'userId' => 'integer',
        'currencyFrom' => 'required|max:3|min:3',
        'currencyTo' => 'required|max:3|min:3',
        'amountSell' => 'sometimes|required|numeric',
        'amountBuy'=>'sometimes|required|numeric',
        'rate'=>'',
        'timePlaced'=>'date_format:y-M-d H:i:s',
        'originatingCountry' => 'required|min:2|max:2',
    ];

    public function getAll(){
        return ConversionMessage::all();
    }

    public function find($id){
        return ConversionMessage::find($id);
    }

    public function findByUserId($userID){

        $collection =  ConversionMessage::where('userId','=',$userID)->get();
        return $collection->toArray();
    }

    private function validate($data)
    {

        $v = \Validator::make($data, $this->rules);
        if ($v->passes()){
            return true;
        }
        $this->errors = $v->messages();
        return false;

    }

    public function create($input){
        $validation = $this->validate($input);

        if($validation){

        }


    }

}