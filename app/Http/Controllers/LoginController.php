<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator; 
use App\Mail\ContactReply; 
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class LoginController extends Controller
{


    /**
     * @return View
     */
    public function login()  //ログイン画面を表示
    {

        return view('login.login');
    }


    public function index()   //メールアドレス入力フォーム表示
    {
        return view('login.index');
    }


    public function send(Request $request)  
    {
        $this->validate($request, ['email' => 'required|email']);

        $user = User::where('email','=',$request->email)->first();
        

        if (is_null($user)) {
            return redirect()->back()->with('message','メールアドレスが存在しません。');
        }

        $token = Str::random(32);//トークン生成
        //dd($user->name);

        $user->reset_token=$token; //リセットトークンの更新
        $user->created_at_token=date('Y-m-d H:i:s');//リセットトークン発行時間の更新

        $user->save(); //DBに保存
        


           mail::to('miyakoa09@gmail.com')  //メールの自動送信設定 $request->email
           ->send(new ContactReply($token));
        
            return view('login.notice'); //送信完了通知画面表示
    
    }


    public function posts(Request $request,$token)
    {   
        return view('login.passwordUpdate', [
            'reset_token' => $token,
        ]); //メールに添付のパスワード再発行URL画面を表示
    }

    public function update(Request $request)   //パスワードのアップデート後、ログイン画面を表示
    {

        $validator = $request->validate([       // 8文字以上になってるかバリデーションしてる
             'password' => 'required|min:8',
             'checkPassword' => 'required|min:8'
         ]);
          
       
             return view('login.login');
        }
    }




