<?php

namespace RedJasmine\AddressAdmin\Repositories;

use Dcat\Admin\Form;
use Dcat\Admin\Repositories\EloquentRepository;
use RedJasmine\Address\Models\Address as Model;
use RedJasmine\Admin\Helpers\Admin\Admin;
use RedJasmine\Support\Data\UserData;

class Address extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    public function store(Form $form)
    {

        $user    = [
            'type'     => $form->input('owner_type'),
            'id'       => $form->input('owner_id'),
            'nickname' => '',
            'avatar'   => '',
        ];
        $owner   = UserData::from($user);
        $service = $this->service();

        $service->setOwner($owner);
        return $service->create($form->updates());

        //return parent::store($form); // TODO: Change the autogenerated stub
    }

    public function service()
    {
        $service = new \RedJasmine\Address\Address();
        $service->setOperator(new Admin());
        return $service;
    }

    public function update(Form $form)
    {
        $service = $this->service();
        return $service->update($form->model()->id, $form->updates());
    }


}
