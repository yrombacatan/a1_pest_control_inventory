<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class UserRepository
 * @package App\Repositories
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'designation',
        'dept',
        'role',
        'mobilenum',
        'email',
        'profile_image',
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
        return User::class;
    }
}
