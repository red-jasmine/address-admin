<?php

namespace RedJasmine\AddressAdmin\Http\Controllers\Admin\Web;

use Illuminate\Http\Request;
use RedJasmine\AddressAdmin\Repositories\Address;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use RedJasmine\Region\Facades\Region;

class AddressController extends AdminController
{

    protected $translation = 'red-jasmine.address::address';

    public function children(Request $request)
    {
        $provinceID = $request->input('q');

        return Region::children($provinceID)->toArray();
    }

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
            $grid->column('owner_id');
            $grid->column('contacts');
            $grid->column('mobile');
//            $grid->column('country_id');
//            $grid->column('province_id');
//            $grid->column('city_id');
//            $grid->column('district_id');
//            $grid->column('street_id');
            $grid->column('country');
            $grid->column('province');
            $grid->column('city');
            $grid->column('district');
            $grid->column('street');
            $grid->column('address');
            $grid->column('full_address');
            $grid->column('tag');
            $grid->column('zip_code');
            $grid->column('is_default');
            $grid->column('sort');
            $grid->column('creator_type');
            $grid->column('creator_id');
            $grid->column('updater_type');
            $grid->column('updater_id');
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
            $show->field('owner_id');
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
            $show->field('zip_code');
            $show->field('tag');
            $show->field('is_default');
            $show->field('sort');
            $show->field('creator_type');
            $show->field('creator_id');
            $show->field('updater_type');
            $show->field('updater_id');
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
            $form->text('owner_type')->required()->maxLength(8);
            $form->text('owner_id')->required();
            $form->text('contacts');
            $form->mobile('mobile');
            $form->hidden('country_id')->default(0);
            $form->select('province_id')
                 ->options(Region::provinces()->pluck('name','id')->toArray())
                ->load('city_id',route('address-admin.api.region.children'),'id','name');
            $form->select('city_id')
                 ->load('district_id', route('address-admin.api.region.children'),'id','name');
            $form->select('district_id')
                 ->load('street_id', route('address-admin.api.region.children'),'id','name');
            $form->select('street_id');
            $form->text('address');

            $form->hidden('country')->default('中国');
            $form->hidden('province');
            $form->hidden('city');
            $form->hidden('district');
            $form->hidden('street');
            $form->text('zip_code')->maxLength(6);


            $form->text('tag');
            $form->text('remarks')->maxLength(100);

            $form->switch('is_default');
            $form->number('sort');
            $form->display('creator_type');
            $form->display('creator_id');
            $form->display('updater_type');
            $form->display('updater_id');
            $form->adminer();
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
