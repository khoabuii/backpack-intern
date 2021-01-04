<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoriesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoriesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation { show as traitShow; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Categories::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/categories');
        CRUD::setEntityNameStrings('categories', 'Danh mục');
//        $this->crud->getTitle('Danh mục');
        $this->crud->getHeading('Danh mục');
        $this->crud->setSubheading('Danh sách các danh mục');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->setListView('vendor.backpack.crud.list_category');
        CRUD::addColumn([
           'label'=>'Tên danh mục',
           'type'=>'text',
           'name'=>'name',
        ]);
        CRUD::addColumn([
            'label'=>'Trạng thái',
            'type'=>'boolean',
            'name'=>'is_active',
            'options'=>[
                1=>'Hoạt động',
                2=>'Không hoạt động'
            ]
        ]);
//        $parent = Categories::with('childrenRecursive')->whereNull('parent_id')->get();
//         $child=Categories::with('parentRecursive')->where('id',4)->get();
//        dd($child);
        CRUD::addColumn([
            'label'=>'Danh mục cha',
            'name'=>'parent_id',
            'type'=>'select',
            'entity'=>'parentRecursive',
            'attribute'=>'name'
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
        $this->crud->setSubheading('Tạo danh mục');
        CRUD::setValidation(CategoriesRequest::class);

//        CRUD::setFromDb(); // fields

        CRUD::field('name')->label('Tên danh mục')->type('text');
        CRUD::field('is_active')->label('Hoạt động')->type('boolean')->default(1);

        $this->crud->addField([
            'name'=>'parent_id',
            'label'=>'Danh mục cha',
            'type'=>'select2',
            'entity'=>'parent',
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
    protected  function  setupShowOperation(){
        CRUD::addColumn([
            'label'=>'Tên danh mục',
            'type'=>'text',
            'name'=>'name',
        ]);
        CRUD::addColumn([
            'label'=>'Trạng thái',
            'type'=>'boolean',
            'name'=>'is_active',
            'options'=>[
                1=>'Hoạt động',
                2=>'Không hoạt động'
            ]
        ]);

    }
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

//    protected function update(Request $request){
//        $cate=Categories::find(2);
//        $cate->name=$request->name;
//        if($request->parent_id)
//            $cate->parent_id=$request->parent_id;
//        $cate->save();
//    }

    protected function show($id){
//        if(Categories::find($id)->where('parent_id',null))
        $cate=Categories::with('parentRecursive')->where('id',$id)->get();

        dd($cate);
        CRUD::addColumn([
            'label'=>'Danh mục cha',
            'name'=>'parent_id',
            'type'=>'model_function',
//            'function_name'=>'parentRecursive',
            'entity'=>$cate,
            'attribute'=>'name'
        ]);
        $content=$this->traitShow($id);
        return $content;
    }
}
