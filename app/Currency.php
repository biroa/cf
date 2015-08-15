<?php namespace Cfair;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    protected $table = 'currencies';
    protected $hidden =
        [
            'id',
            'currency_name',
            'created_at',
            'updated_at'
        ];

}
