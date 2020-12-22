@extends(backpack_view('blank'))

@php


    \Backpack\CRUD\app\Library\Widget::add([
   'type'=>'chart',
   'controller'=>\App\Http\Controllers\Admin\Charts\WeeklyUsersChartController::class,
   'wrapper'       => ['class' => 'col-sm-12 col-md-12'],
]);


@endphp

@section('content')
    <center>
        <h3>Biểu đồ thể hiện sự biến động trong hệ thống trong 30 ngày</h3>
    </center>
@endsection
