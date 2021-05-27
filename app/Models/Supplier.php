<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Supplier
 * @package App\Models
 * @version April 23, 2021, 1:38 am UTC
 *
 * @property string name
 * @property string email
 * @property string phone
 * @property string address
 * @property string city
 * @property string type
 * @property string photo
 * @property string shop_name
 * @property string account_holder
 * @property string account_number
 * @property string bank_name
 * @property string bank_branch
 * @property boolean is_active
 */
class Supplier extends Model
{
    use SoftDeletes;

    public $table = 'supplier';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'type',
        'photo',
        'shop_name',
        'account_holder',
        'account_number',
        'bank_name',
        'bank_branch'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'city' => 'string',
        'type' => 'string',
        'photo' => 'string',
        'shop_name' => 'string',
        'account_holder' => 'string',
        'account_number' => 'string',
        'bank_name' => 'string',
        'bank_branch' => 'string',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'address' => 'required',
        'city' => 'required',
        'type' => 'required'
    ];


}
