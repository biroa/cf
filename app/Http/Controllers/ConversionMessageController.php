<?php namespace Cfair\Http\Controllers;

use Cfair\Interfaces\ConversionMessageInterface;
use Cfair\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class ConversionMessageController extends Controller
{

    protected $conversionMessage;
    protected $userID;

    public function __construct(ConversionMessageInterface $conversionMessage){
        //authenticating messages route with middleware
        //$this->middleware('auth');
        $this->conversionMessage = $conversionMessage;
    }


    /**
     * Display a listing of the resource based on userID
     *
     * @param \Illuminate\Contracts\Auth\Guard $guard
     *
     * @return mixed
     */
    public function index(Guard $guard)
    {
        //Todo:: I have to delete this after I set back auth
        $this->userID = $guard->user();
        if(empty($this->userID)){
            $this->userID = 1;
        }
        return $this->conversionMessage->findByUserId($this->userID);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        dd('called');
//        return $this->conversionMessage->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        return $this->conversionMessage->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
