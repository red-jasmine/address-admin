<?php

namespace RedJasmine\AddressAdmin\Http\Controllers\Admin\Web;

use RedJasmine\AddressAdmin\Repositories\Address;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class AddressController extends AdminController
{

    protected $translation = 'red-jasmine.address::address';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Address(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('owner_type');
            $grid->column('owner_uid');
            $grid->column('contacts');
            $grid->column('mobile');
            $grid->column('country_id');
            $grid->column('province_id');
            $grid->column('city_id');
            $grid->column('district_id');
            $grid->column('street_id');
            $grid->column('country');
            $grid->column('province');
            $grid->column('city');
            $grid->column('district');
            $grid->column('street');
            $grid->column('address');
            $grid->column('tag');
            $grid->column('zip_code');
            $grid->column('is_default');
            $grid->column('sort');
            $grid->column('creator_type');
            $grid->column('creator_uid');
            $grid->column('updater_type');
            $grid->column('updater_uid');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Address(), function (Show $show) {
            $show->field('id');
            $show->field('owner_type');
            $show->field('owner_uid');
            $show->field('contacts');
            $show->field('mobile');
            $show->field('country_id');
            $show->field('province_id');
            $show->field('city_id');
            $show->field('district_id');
            $show->field('street_id');
            $show->field('country');
            $show->field('province');
            $show->field('city');
            $show->field('district');
            $show->field('street');
            $show->field('address');
            $show->field('tag');
            $show->field('zip_code');
            $show->field('is_default');
            $show->field('sort');
            $show->field('creator_type');
            $show->field('creator_uid');
            $show->field('updater_type');
            $show->field('updater_uid');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Address(), function (Form $form) {
            $form->display('id');
            $form->text('owner_type');
            $form->text('owner_uid');
            $form->text('contacts');
            $form->text('mobile');
            $form->text('country_id');
            $form->text('province_id');
            $form->text('city_id');
            $form->text('district_id');
            $form->text('street_id');
            $form->text('country');
            $form->text('province');
            $form->text('city');
            $form->text('district');
            $form->text('street');
            $form->text('address');
            $form->text('tag');
            $form->text('zip_code');
            $form->text('is_default');
            $form->text('sort');
            $form->text('creator_type');
            $form->text('creator_uid');
            $form->text('updater_type');
            $form->text('updater_uid');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
