<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version April 23, 2021, 1:42 am UTC
 *
 * @property string gen_id
 * @property string sku_barcode_id
 * @property string name
 * @property string description
 * @property number price
 * @property string unit_type
 * @property integer category_id
 * @property integer supplier_id
 * @property string|\Carbon\Carbon buying_date
 * @property string|\Carbon\Carbon expire_date
 * @property boolean is_active
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'product';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'gen_id',
        'sku_barcode_id',
        'name',
        'description',
        'price',
        'unit_type',
        'category_id',
        'supplier_id',
        'buying_date',
        'expire_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'gen_id' => 'string',
        'sku_barcode_id' => 'string',
        'name' => 'string',
        'description' => 'string',
        'price' => 'float',
        'unit_type' => 'string',
        'category_id' => 'integer',
        'supplier_id' => 'integer',
        'buying_date' => 'datetime',
        'expire_date' => 'datetime',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sku_barcode_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'unit_type' => 'required',
        'category_id' => 'required',
        'supplier_id' => 'required'
    ];


}
