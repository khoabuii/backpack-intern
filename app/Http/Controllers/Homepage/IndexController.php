<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Categories;
use App\Models\CategoriesChild;
use App\Models\Comments;
use App\Models\Posts;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    //
    public function  __construct()
    {
        $data['categories']=Categories::all();
        $data['categories_child']=CategoriesChild::all();
        view()->share($data);
    }

    public function index(){
        $data['posts']=Posts::OrderBy('id','desc')->paginate(3);
        return view('index',$data);
    }
    public function viewPosts($id){
        $data['post']=Posts::findOrFail($id);
        $data['posts_list']=Posts::all()->take(5);
        $data['comments']=Comments::where('post_id',$id)->get();

        return view('view-post',$data);
    }
    public function showLogin(){
        return view('login');
    }
    public function postLogin(Request $request){
        $input=$request->all();
        $login=Auth::attempt(['email'=>$input['email'],'password'=>$input['password']]);
        if(!$login){
            return back()->with('errors','Đăng nhập sai');
        }
        return redirect('/');
    }

    public function showRegister(){
        return view('register');
    }

    public function postRegister(Request $request, UserRequest $rule){

        $input=$request->all();
        $user=new User();
        $user->name=$input['name'];
        $user->email=$input['email'];
        $user->password=bcrypt($input['password_confirmation']);
        $user->is_admin=0;
        $user->save();
        return redirect('/login')->with('success','Đã đăng ký thành công, vui lòng đăng nhập');
    }

    public function postComment($id, Request $request){
        $comment=new Comments();
        $comment->user_id=Auth::user()->id;
        $comment->post_id=$id;
        $comment->content=$request->content;
        $comment->save();
        return back()->with('success','Đã bình luận thành công');
    }
    public function logout(){
        Auth::logout();
        return back();
    }
}
