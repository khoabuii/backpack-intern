<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('tag', 'TagCrudController');

    Route::crud('categories', 'CategoriesCrudController');

    Route::crud('posts', 'PostsCrudController');
    Route::crud('categories_child', 'CategoriesChildCrudController');
    Route::crud('user', 'UserCrudController');
    Route::get('charts/weekly-users', 'Charts\WeeklyUsersChartController@response')->name('charts.weekly-users.index');
    Route::crud('comments', 'CommentsCrudController');
}); // this should be the absolute last line of this file
