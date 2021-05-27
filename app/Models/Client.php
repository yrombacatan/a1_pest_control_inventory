<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 * @package App\Models
 * @version April 26, 2020, 9:30 pm UTC
 *
 * @property string customer
 * @property string abnnum
 * @property string faxnum
 * @property string address
 * @property string bill_attntion
 * @property string bill_address
 * @property string bill_city
 * @property string bill_state
 * @property string bill_pcode
 * @property string bill_cntry
 * @property string bill_taxrate
 * @property string bill_payment
 * @property boolean is_active
 * @property string profile_image
 */
class Client extends Model
{
    use SoftDeletes;

    public $table = 'client';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'customer',
        'abnnum',
        'faxnum',
        'address',
        'bill_attntion',
        'bill_address',
        'bill_city',
        'bill_state',
        'bill_pcode',
        'bill_cntry',
        'bill_taxrate',
        'bill_payment',
        'is_active',
        'profile_image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'customer' => 'string',
        'abnnum' => 'string',
        'faxnum' => 'string',
        'address' => 'string',
        'bill_attntion' => 'string',
        'bill_address' => 'string',
        'bill_city' => 'string',
        'bill_state' => 'string',
        'bill_pcode' => 'string',
        'bill_cntry' => 'string',
        'bill_taxrate' => 'string',
        'bill_payment' => 'string',
        'is_active' => 'boolean',
        'profile_image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customer' => 'required',
        'address' => 'required',
        'bill_address' => 'required'
    ];


}
