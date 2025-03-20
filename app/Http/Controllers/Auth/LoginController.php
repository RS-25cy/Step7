<?php

// 名前空間の指定：このクラスが属するディレクトリを示す。
// Authディレクトリ内にあることを表している。
namespace App\Http\Controllers\Auth;

// 基底コントローラーをインポート。
// すべてのコントローラーが継承するベースクラスを利用可能にする。
use App\Http\Controllers\Controller;

// ルートのリダイレクト先を管理するクラスをインポート。
// ユーザーのログイン後のリダイレクト先を設定するために使用する。
use App\Providers\RouteServiceProvider;

// ユーザー認証（ログイン処理）を行うためのトレイトをインポート。
// このトレイトにより、ログイン処理の基本的なロジックが提供される。
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// ユーザー認証（ログイン処理）を管理するコントローラーを定義。
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller（ログインコントローラー）
    |--------------------------------------------------------------------------
    |
    | このコントローラーはアプリケーションのユーザー認証とログイン後の
    | リダイレクト処理を行います。このコントローラーは AuthenticatesUsers
    | トレイトを使って、認証機能を簡単に提供します。
    |
    */

    // AuthenticatesUsers トレイトを利用してログイン機能を提供。
    use AuthenticatesUsers;

    /**
     * ログイン後にユーザーをリダイレクトするパスを定義。
     *
     * @var string
     */
    protected $redirectTo = '/products'; // ログイン後に「/products」にリダイレクトする。

    /**
     * コントローラーの新しいインスタンスを作成。
     *
     * @return void
     */
    public function __construct()
    {
        // ゲスト（未認証ユーザー）のみアクセスを許可。
        // ただし「logout」メソッドだけは認証済みユーザーに許可する。
        $this->middleware('guest')->except('logout');
    }
}