<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class Usercontroller extends Controller
{
    // 新規ユーザー登録画面
    public function register(){
        return view ('user/register');
    }

    // ユーザー登録機能
    public function userRegister(Request $request){
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

    // ユーザー一覧画面
    public function userlist(){
        $user = User::all();

        return view ('user/userlist',compact('user'));
    }

    

    // ユーザー一覧からユーザー更新画面へ
    public function edit(Request $request){

        $user = User::where('id', '=', $request->id)->first();
        $request->session()->put('user_data', $user);
        return view ('user/edit', compact('user'));
    }

    // ユーザー情報更新機能
    public function useredit(Request $request){

        $data = $request->session()->get('user_data');
        if($request->action){
            $user = User::where('id', '=', $data['id'])->first();
            return redirect()->route('user_edit', ['id' => $user]);
        }
        $user = User::where('id', '=', $data['id'])->first();
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->userAuthority = $data['userAuthority'];
        $user->save();
        return redirect ('user/list');
    }

    // ユーザー検索機能
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

    // バリデーション->確認画面
    public function show(Request $request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'digits_between:8,11',
            'email' => ['email:dns', Rule::unique('users')->ignore($request->id, 'id')],
            'userAuthority' => 'required'
        ];
        $message = [
            'name.required' => '名前を入力してください',
            'phone.digits_between' => '電話番号は8~11桁の半角数値で入力してください',
            'email.email' => '有効なメールアドレスを入力してください',
            'email.unique' => 'このメールアドレスは既に使用されています',
            'userAuthority.required' => '権限を選択してください'
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()){
            $Duser = User::where('id', '=', $request->id)->first();
            if(isset($Duser)){
                return redirect('/user/edit/'.$request->id)
            ->withErrors($validator)
            ->withInput();
            exit;
            }
            return redirect('/user/register')
            ->withErrors($validator)
            ->withInput();
        } else {
            $user = $request->all();
            $Duser = User::where('id', '=', $request->id)->first();
            $request->session()->put('user_data', $user);
            return view ('user/confirm', compact('user', 'Duser'));
        }
    }

    // ユーザー削除・確認画面
    public function deleteconfirm(Request $request){
        $data = $request->session()->get('user_data');
        $user = User::where('id', '=', $data['id'])->first();
        return view ('user/delete', compact('user'));
    }

    // ユーザー削除機能
        public function userdelete(Request $request){
        $data = $request->session()->get('user_data');
        $user = User::where('id', '=', $data['id'])->first();
        if($request->action){
            return redirect()->route('user_edit', ['id' => $user]);
            exit;
        }
        $user->delete();
        return redirect ('user/list');
    }
}