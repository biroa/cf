<?php namespace Cfair\Http\Controllers;

use Cfair\Http\Requests;
use Cfair\Currency;

class CurrencyController extends Controller
{

    public function __construct(){
        //authenticating messages route with middleware
        //Todo:: I have to uncomment this line to have authentication
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * Todo:: this is only a quick solution! Only to present currency data from the table
     *
     * @return Response
     */
    public function index()
    {
       $data =  Currency::all()->toArray();
        return ['SUCCESS' => $data];


    }

}
