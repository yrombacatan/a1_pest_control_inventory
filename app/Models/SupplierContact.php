<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SupplierContact
 * @package App\Models
 * @version April 23, 2021, 1:42 am UTC
 *
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string phone
 * @property string photo
 * @property boolean is_active
 */
class SupplierContact extends Model
{
    use SoftDeletes;

    public $table = 'supplier_contact';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'photo',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'photo' => 'string',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'is_active' => 'required'
    ];

    
}
