<?php

namespace App\Repositories;

use App\Models\Technician;
use App\Repositories\BaseRepository;

/**
 * Class TechnicianRepository
 * @package App\Repositories
 * @version April 23, 2021, 1:39 am UTC
*/

class TechnicianRepository extends BaseRepository
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
        return Technician::class;
    }
}
