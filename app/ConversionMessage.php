<?php namespace Cfair;

use Illuminate\Database\Eloquent\Model;

class ConversionMessage extends Model
{
    public $defaultIP = '89.100.85.240';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conversion_messages';


    protected $guarded =
        [
            'id',
            'is_sell',
            'conversion',
            'originatingCountry'
        ];
    protected $v;
    protected $errors;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
        [
            'userId',
            'currencyFrom',
            'currencyTo',
            'amountSell',
            'amountBuy',
            'rate',
            'timePlaced'

        ];


    /**
     * @param $base
     * @param $rate
     *
     * @return string
     */
    public function setSellConversion($base, $rate)
    {
        return bcmul($base, $rate, 4);
    }


    /**
     * @param $base
     * @param $rate
     *
     * @return string
     */
    public function setBuyConversion($base, $rate)
    {
        return bcdiv($base, $rate, 4);
    }


    /**
     * @param $value
     *
     * @return bool|string
     */
    public function setTimePlaced($value)
    {
        return date('Y-m-d H:i:s', strtotime($value));
    }


    /**
     * @param $value
     *
     * @return bool|string
     */
    public function getTimePlacedAttribute($value)
    {
        return date('d-M-y H:i:s', strtotime($value));
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden =
        [
            'id',
//            'userId',
        ];

    //required_without: AmountSell or AmountBuy must be presented at least
    private $rules = [
        'userId' => 'integer',//todo:: I have to set this back to required at the end of development
        'currencyFrom' => 'required|size:3',//size = exact length in char
        'currencyTo' => 'required|size:3',
        'amountSell' => 'required_without:amountBuy|numeric|min:100',
        'amountBuy' => 'required_without:amountSell|numeric|min:200',
        'rate' => 'required|numeric',
        'timePlaced' => 'date_format:y-M-d H:i:s',
        //'originatingCountry' => 'required|size:2', //we do not use it we fill out with php
    ];

    public function ruleSellAndBuyEmpty()
    {
        return 'amountSell and amountBuy fields are empty! You have to fill one at least';
    }

    public function ruleSellAndBuyFilled()
    {
        return 'amountSell and amountBuy fields are filled! You have to fill one at once!';
    }

    public function ruleSellAndBuyUnknown()
    {
        return 'Unknown error!';
    }

    public function validate($data)
    {
        // make a new validator object
        $this->v = \Validator::make($data, $this->rules);

        // check for failure
        if ( $this->v->fails() ) {
            // set errors and return false
            return false;
        }

        // validation pass
        return true;
    }

    public function errors()
    {
        return $this->v->messages();
    }

}
