<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator; 
use App\Mail\ContactReply; 
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{


    /**
     * @return View
     */
    public function login()  //ログイン画面を表示
    {

        return view('login.login');
    }


/**
     * 認証の試行を処理
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function authenticate(LoginFormRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);


        if (Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();
            $role = auth()->user()->userAuthority;
            
            //管理者画面
            if ($role == 1) {
                return redirect('event/top');
            }
            //ユーザー画面
            if ($role == 2) {
                return redirect('entry');
            }
        }

            return redirect('login')->withErrors([
                    'login_errors' => 'メールアドレスまたはパスワードが違います。',
                ]);
    }

    public function index()   //メールアドレス入力フォーム表示
    {
        return view('login.index');
    }


    public function send(Request $request)  
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email'
        ]);
        
        //バリデーション
        if ($validator->fails()) {
            return redirect()->back()->with('check','メールアドレスを入力してください。');
        }

        $user = User::where('email','=',$request->email)->first();
        if (is_null($user)) {
            return redirect()->back()->with('messages','メールアドレスが存在しません。');
        }

        $token = Str::random(32);//トークン生成

        $user->reset_token=$token; //リセットトークンの更新
        $user->created_at_token=date('Y-m-d H:i:s');//リセットトークン発行時間の更新
        $user->save(); //DBに保存
        
        //mail::to('miyakoa09@gmail.com')  //メールの自動送信設定 $request->email
        mail::to($request->email)  //メールの自動送信設定 $request->email
        ->send(new ContactReply($token));
        
            return view('login.notice'); //送信完了通知画面表示
    
    }

        //メールに添付のパスワード再発行URL画面を表示
    public function posts(Request $request,$token)
    {   
        
        $user = User::where('reset_token','=',$request->token)->first();
        
        // トークンが一致しない場合、エラーメッセージが出る
        if (is_null($user)) {
        return view('login.error');
        }


        $createTime = User::where('reset_token',$request->token)->first();
        
        //数値型になおす
        $timeTest = time() - strtotime($createTime->created_at_token);
        
        if ($timeTest > 3600) {
            return view('login.error');
        
        } else {
        
            return view('login.passwordUpdate', [
            'reset_token' => $token,
        ]); 
        }
    }
    
    //パスワードのアップデート後、ログイン画面を表示
    public function update(Request $request)   
    {
            $rulus = [
                'password' => [
                    'required','min:8','regex:/^(?=.*?[a-zA-Z])(?=.*?\d)[a-zA-Z\d]/'],
                'password_confirmation' => [
                    'required','same:password',
                ],
            ];
            
            $message = [
                'password.required' => '・パスワードを入力してください',
                'password.min'=> '・8文字以上必要です',
                'password.regex' => '・半角英数で入力してください',
                'password_confirmation.required' => '・パスワード確認用は必須です',
                'password_confirmation.same' => '・新しいパスワードと新しいパスワード（確認用）が一致しません。'
            ];
            $validator = Validator::make($request->all(), $rulus, $message);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
        

       //tokenが一致してるかの処理
        $user = User::where('reset_token','=',$request->reset_token)->first();
        
       // トークンが一致しない場合、エラーメッセージが出る
        if (is_null($user)) {
        return redirect()->back()->with('message','もう一度メールを再発行してください。');
        }
        $user->password = Hash::make($request['password']);
        $user->save();

            return view('login.login');
    }


        /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}




