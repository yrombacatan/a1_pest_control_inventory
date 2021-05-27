<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryDetails extends Model
{

    public $table = 'incoming_delivery_details';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'ref_no ' => 'string',
        'product_id' => 'string',
        'quantity' => 'integer',
        'unit_type' => 'string',
        'buying_price' => 'float',
        'total_cost' => 'float'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ref_no',
        'product_id',
        'quantity',
        'unit_type',
        'buying_price',
        'total_cost'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ref_no' => 'required'
    ];

    /**
     * The relationship to the owning delivery.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

}
