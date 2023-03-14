<?php

namespace RedJasmine\AddressAdmin\Facades;

use Illuminate\Support\Facades\Facade;

class AddressAdmin extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'address-admin';
    }
}
