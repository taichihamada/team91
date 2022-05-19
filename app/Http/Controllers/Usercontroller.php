<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class Usercontroller extends Controller
{
    public function register(){
        return view ('user/register');
    }

    public function userRegister(Request $request)
    {
        $data = $request->session()->get('user_data');
        if($request->action){
            return redirect('/user/register')
            ->withInput($data);
        }
        $user = new User();
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->userAuthority = $data['userAuthority'];
        $user->save();
        return redirect('user/list');
    }

    public function userlist(){
        $user = User::all();

        return view ('user/userlist',compact('user'));
    }

    public function confirm(Request $request){

        $user = User::where('id', '=', $request->id)->first();

        return view ('user/confirm', compact('user'));
    }

    public function edit(Request $request){

        $user = User::where('id', '=', $request->id)->first();
        return view ('user/edit', compact('user'));
    }

    public function useredit(Request $request){

        $user = User::where('id', '=', $request->id)->first();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->userAuthority = $request->userAuthority;
        $user->save();
        return view ('user/confirm', compact('user'));
    }

    public function serch(Request $request){
        $keyword = $request->input('keyword');
        $query = User::query();
        if(!empty($keyword)){
            $query->where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('phone', 'LIKE', "%{$keyword}%")
            ->orWhere('email', 'LIKE', "%{$keyword}%");
        }
        
        $user = $query->get();
        return view ('user/userlist', compact('user', 'keyword'));
    }

    public function show(Request $request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'digits_between:8,11',
            'email' => 'email',
            'userAuthority' => 'required'
        ];
        $message = [
            'name.required' => '名前を入力してください',
            'phone.digits_between' => '電話番号は8~11桁の数値で入力してください',
            'email.email' => '有効なメールアドレスを入力してください',
            'userAuthority.required' => '入力してください'
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()){
            return redirect('/user/register')
            ->withErrors($validator)
            ->withInput();
        } else {
            $user = $request->all();
            $request->session()->put('user_data', $user);
            return view ('user/confirm', compact('user'));
        }
    }
}