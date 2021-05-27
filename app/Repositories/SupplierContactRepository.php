<?php

namespace App\Repositories;

use App\Models\SupplierContact;
use App\Repositories\BaseRepository;

/**
 * Class SupplierContactRepository
 * @package App\Repositories
 * @version April 23, 2021, 1:42 am UTC
*/

class SupplierContactRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'photo',
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
        return SupplierContact::class;
    }
}
