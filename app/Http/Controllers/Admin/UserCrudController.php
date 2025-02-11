<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Charts\WeeklyUsersChartController;
use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
//        CRUD::setFromDb(); // columns
//          $this->crud->disableBulkActions();
        $this->crud->removeButton( 'delete' );
        $this->crud->removeButton('create');

          CRUD::addColumn([
              'label'=>'Tên tài khoản',
              'name'=>'name',
              'type'=>'string'
          ]);
          CRUD::addColumn([
              'label'=>'Địa chỉ Email',
              'name'=>'email',
              'type'=>'email'
          ]);
          CRUD::addColumn([
              'label'=>'Quyền',
              'name'=>'is_admin',
              'type'=>'boolean',
              'options'=>[
                  1=>'Admin',
                  0=>'Thường'
              ]
          ]);

          // widget
        Widget::add()->to('before_content')->type('card')->content(null);
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

//        CRUD::setFromDb(); // fields
         CRUD::addField([
             'label'=>'Tên',
             'name'=>'name',
             'type'=>'text'
         ]);
         CRUD::addField([
             'label'=>'Admin',
             'name'=>'is_admin',
             'type'=>'boolean'
         ]);
         CRUD::addField([
             'label'=>'Email',
             'name'=>'email',
             'type'=>'email',
             'disabled'=>true
         ]);

         Widget::add([
             'type'=>'chart',
             'controller'=>WeeklyUsersChartController::class
         ]);
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
