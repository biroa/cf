<?php namespace Cfair;

use Illuminate\Database\Eloquent\Model;


class ConversionMessage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'conversion_messages';

    protected $guarded =
        [
            'id'
        ];
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
            'timePlaced',
            'originatingCountry'
        ];

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
}
