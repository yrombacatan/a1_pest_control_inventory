<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\BaseRepository;

/**
 * Class ClientRepository
 * @package App\Repositories
 * @version April 26, 2020, 9:30 pm UTC
*/

class ClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customer',
        'abnnum',
        'faxnum',
        'address',
        'bill_attntion',
        'bill_address',
        'bill_city',
        'bill_state',
        'bill_pcode',
        'bill_cntry',
        'bill_taxrate',
        'bill_payment',
        'is_active',
        'profile_image'
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
        return Client::class;
    }
}
