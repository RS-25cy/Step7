<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    | このコントローラーは、アプリケーションに新しく登録したユーザーの
    | メールアドレスの確認を処理する役割を担っています。
    | ユーザーが元のメールを受け取っていない場合は、確認メールを再送することもできます。
    |
    */

    use VerifiesEmails;  // Laravelのメール確認機能を使用するため、VerifiesEmailsトレイトをインポート

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';  // メール確認後にユーザーをリダイレクトするURLを設定。ここでは/homeにリダイレクト

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');  // このコントローラーのアクションにアクセスするには、ユーザーが認証されている必要がある
        $this->middleware('signed')->only('verify');  // メール確認の際に、署名付きURLが必要
        $this->middleware('throttle:6,1')->only('verify', 'resend');  // 短時間内に確認リクエストが多すぎないように制限 (6回/1分)
    }
}