<?php

namespace App\Repositories;

use App\Models\Delivery;
use App\Repositories\BaseRepository;

/**
 * Class DeliveryRepository
 * @package App\Repositories
 * @version April 26, 2021, 2:47 am UTC
*/

class DeliveryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ref_no',
        'transac_date',
        'supplier_id',
        'total_prod_costs',
        'remarks',
        'is_active'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Delivery::class;
    }
}
