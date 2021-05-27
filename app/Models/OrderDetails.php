<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{

    public $table = 'outgoing_order_details';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'transac_no ' => 'string',
        'product_id' => 'string',
        'prod_qty' => 'integer',
        'prod_price' => 'string',
        'prod_total' => 'float'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transac_no',
        'product_id',
        'prod_qty',
        'prod_price',
        'prod_total'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'transac_no' => 'required'
    ];

    /**
     * The relationship to the owning delivery.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
