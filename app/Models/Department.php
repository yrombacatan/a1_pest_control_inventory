<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Department
 * @package App\Models
 * @version April 26, 2020, 11:34 pm UTC
 *
 * @property string name
 * @property string slug
 * @property boolean is_active
 */
class Department extends Model
{
    use SoftDeletes;

    public $table = 'department';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'slug',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'slug' => 'string',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'slug' => 'required',
        'is_active' => 'required'
    ];

    /**
     * Get the users.
     */
    // public function users()
    // {
    //     return $this->hasMany('App\Model\User');
    // }

}
