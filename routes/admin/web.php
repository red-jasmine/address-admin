<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use RedJasmine\Support\Helpers\DomainRoute;

Route::group([
                 'domain'     => DomainRoute::adminDomain(),
                 'prefix'     => DomainRoute::adminWebPrefix('address'),
                 'namespace'  => 'RedJasmine\AddressAdmin\Http\Controllers\Admin\Web',
                 'middleware' => config('admin.route.middleware'),
             ], function (Router $router) {

    $router->get('api/region/children', 'AddressController@children')->name('address-admin.api.region.children');
    $router->resource('address', 'AddressController');


});
