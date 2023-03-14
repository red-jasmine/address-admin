<?php

namespace RedJasmine\AddressAdmin\Repositories;

use RedJasmine\Address\Models\Address as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Address extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
