<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 * @version April 26, 2021, 2:47 am UTC
 *
 * @property string transac_no
 * @property string|\Carbon\Carbon transac_date
 * @property integer order_by
 * @property number total_order_cost
 * @property string remarks
 * @property boolean order_stat
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'outgoing_order';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'transac_no',
        'transac_date',
        'order_by',
        'total_order_cost',
        'remarks',
        'order_stat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transac_no' => 'string',
        'transac_date' => 'datetime',
        'order_by' => 'integer',
        'total_order_cost' => 'float',
        'remarks' => 'string',
        'order_stat' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'transac_date' => 'required',
        'order_by' => 'required'
    ];


}
