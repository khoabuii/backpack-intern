<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostsRequest;
use App\Models\Categories;
use App\Models\Categories_child;
use App\Models\Posts;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;

/**
 * Class PostsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Posts::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/posts');
        CRUD::setEntityNameStrings('posts', 'posts');
        $this->crud->setHeading('Bài viết');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // column
        CRUD::addColumn([
            'label'=>'Tiêu đề',
            'type'=>'text',
            'name'=>'title'
        ]);
        CRUD::addColumn([
            'label'=>'Hình ảnh',
            'type'=>'image',
            'name'=>'image'
        ]);
        CRUD::addColumn([
            'label'=>'Tin hot',
            'type'=>'boolean',
            'name'=>'hot_news',
            'options'=>[
                1=>'Có',
                0=>'Không'
            ]
        ]);

        CRUD::addColumn([
            'label'=>'Tin đặc biệt',
            'type'=>'boolean',
            'name'=>'special_news',
            'options'=>[
                1=>'Có',
                0=>'Không'
            ]
        ]);

        CRUD::addColumn(
            [
                'label'     => 'Danh mục', // Table column heading
                'type'      => 'select',
                'name'      => 'category', // the column that contains the ID of that connected entity;
                'entity'    => 'categories', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
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
        CRUD::setSubHeading('Thêm bài viết');
        CRUD::setValidation(PostsRequest::class); // $this->crud->setValidation(PostsRequest::class);

        CRUD::setFromDb(); // fields

        // $this->crud->addField();
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
        CRUD::field('image')->type('browse')->label('Hình ảnh');
        crud::field('summary')->type('textarea')->label('Tóm tắt');
        CRUD::field('content')->type('ckeditor')->label('Nội dung');
        CRUD::field('special_news')->label('Tin đặc biệt')->type('boolean');

        $this->crud->addField([
            'label'=>'Tin hot',
            'type'=>'boolean',
            'name'=>'hot_news',
            'default'=>0
        ]);
        $this->crud->addField([
            'label' => 'Danh mục bài viết',
            'type' => 'select2',
            'name' => 'category',
            'entity'=>'categories',
            'attribute'=>'name',
        ]);
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
     protected function store(Request $request){
         CRUD::setValidation(PostsRequest::class);

         $post=new Posts();
         $post->title=$request->title;
         $post->summary=$request->summary;
         $post->image=$request->image;
         $post->content=$request->content;
         $post->category=$request->category;
         $post->save();

         return redirect('/admin/posts');
     }
}
