<?php namespace Cfair\Repositories;

use Cfair\Interfaces\ConversionMessageInterface;
use Cfair\ConversionMessage;

class ConversionMessageRepository implements ConversionMessageInterface{

    public function getAll(){
        return ConversionMessage::all();
    }

    public function find($id){

    }

    public function create($input){

    }

}