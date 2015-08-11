<?php namespace Cfair\Http\Controllers;

use Cfair\Http\Requests;
use Cfair\Interfaces\ConversionMessageInterface;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Support\Facades\Input;

class ConversionMessageController extends Controller
{

    protected $conversionMessage;
    protected $userID;
    protected $response;
    protected $statusMsg;
    protected $errorAPI = 'ERROR';
    protected $successAPI = 'SUCCESS';
    protected $forbiddenError = 400;
    protected $noErrorSuccess = 200;

    public function __construct(ConversionMessageInterface $conversionMessage, Response $factory)
    {
        //authenticating messages route with middleware
        //$this->middleware('auth');
        $this->conversionMessage = $conversionMessage;
        $this->response = $factory;
    }

    /**
     * Return messagebyStatusCode
     *
     * @param $statusCode
     *
     * @return string
     */
    public function messageByStatusCode($statusCode){
        if ( $statusCode == $this->noErrorSuccess ) {
            $this->statusMsg = $this->successAPI;
        } elseif ( $statusCode == $this->forbiddenError ) {
            $this->statusMsg = $this->errorAPI;
        }

        return $this->statusMsg;
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
        if ( empty($this->userID) ) {
            $this->userID = 1;
        }

        list($data, $statusCode) = $this->conversionMessage->findByUserId($this->userID);
        $message = $this->messageByStatusCode($statusCode);
        return $this->response->json([ $message => $data ], $statusCode);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //create()
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        list($data, $statusCode) = $this->conversionMessage->create(Input::all());
        $message = $this->messageByStatusCode($statusCode);
        return $this->response->json([ $message => $data ], $statusCode);
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

        list($data, $statusCode) = $this->conversionMessage->find($id);
        $message = $this->messageByStatusCode($statusCode);
        return $this->response->json([ $message => $data ], $statusCode);
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
        //edit()
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
        //delete()
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
        //destroy()
    }

}
