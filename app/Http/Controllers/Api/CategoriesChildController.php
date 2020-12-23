<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categories_child;
use http\Env\Response;
use Illuminate\Http\Request;

class CategoriesChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{
            $pageSize=(int)$_GET['pageSize'];
            return Categories_child::paginate($pageSize);
        }catch (\Exception $e){
            return Categories_child::paginate(5);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cate=Categories_child::create($request->all());
        return \response()->json('Add category child successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cate=Categories_child::findOrFail($id);

        return response()->json($cate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cate=Categories_child::findOrFail($id);
        $cate->update($request->all());
        return $cate;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Categories_child::destroy($id);
        return response()->json(array([
            'status'=>true,
            'message'=>'Categories child deleted id='.$id
        ]));
    }
}
