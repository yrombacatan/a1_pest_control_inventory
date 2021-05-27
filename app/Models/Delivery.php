<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Delivery
 * @package App\Models
 * @version April 26, 2021, 2:47 am UTC
 *
 * @property string ref_no
 * @property string|\Carbon\Carbon transac_date
 * @property integer supplier_id
 * @property number total_prod_costs
 * @property string remarks
 * @property boolean is_active
 */
class Delivery extends Model
{
    use SoftDeletes;

    public $table = 'incoming_delivery';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'ref_no',
        'transac_date',
        'supplier_id',
        'total_prod_costs',
        'remarks'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ref_no' => 'string',
        'transac_date' => 'datetime',
        'supplier_id' => 'integer',
        'total_prod_costs' => 'float',
        'remarks' => 'string',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ref_no' => 'required',
        'transac_date' => 'required',
        'supplier_id' => 'required'
    ];


}
