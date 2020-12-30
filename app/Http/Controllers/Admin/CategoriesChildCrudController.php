<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoriesChildRequest;
use App\Models\CategoriesChild;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
/**
 * Class Categories_childCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoriesChildCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\CategoriesChild::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/categories_child');
        CRUD::setEntityNameStrings('categories_child', 'categories_children');
        CRUD::setHeading('Danh mục con');
        CRUD::setSubHeading('Thêm danh mục');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns
        CRUD::addColumn(
            [
                'label'     => 'Danh mục', // Table column heading
                'type'      => 'select',
                'name'      => 'category_child', // the column that contains the ID of that connected entity;
                'entity'    => 'category', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                // 'model'     => Categories_child::class, // foreign key model
            ]);
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
        CRUD::setValidation(CategoriesChildRequest::class);

//        CRUD::setFromDb(); // fields
        CRUD::addField([
            'label'=>'Tên danh mục',
            'type'=>'text',
            'name'=>'name',
//            'attribute'=>'name'
        ]);
        CRUD::addField([
            'label' => 'Danh mục',
            'type' => 'select2',
            'name' => 'cate',
            'entity'=>'category',
            'attribute'=>'name'
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
