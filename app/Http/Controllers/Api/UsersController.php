<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index(){
        $users=User::all();
        return response()->json($users);
    }
    public function show($id){
        $user=User::findOrFail($id);
        if($user==true){
            return response()->json($user);
        }else{
            return response()->json(array(['error'=>'user not found']));
        }

    }
}
