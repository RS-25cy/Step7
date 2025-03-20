<?php

// 名前空間の指定：このクラスが属するディレクトリを示す。
// Authディレクトリ内にあることを表している。
namespace App\Http\Controllers\Auth;

// 基底コントローラーをインポート。
// すべてのコントローラーが継承するベースクラスを利用可能にする。
use App\Http\Controllers\Controller;

// パスワードリセット機能を提供するトレイトをインポート。
// パスワードリセット処理の基本機能を提供する。
use Illuminate\Foundation\Auth\ResetsPasswords;

// パスワードリセット処理を管理するコントローラーを定義。
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller（パスワードリセットコントローラー）
    |--------------------------------------------------------------------------
    |
    | このコントローラーはパスワードリセットリクエストの処理を担当。
    | ResetsPasswordsトレイトを利用して、基本的な機能を簡単に実装できる。
    | 必要に応じてメソッドをオーバーライドしてカスタマイズが可能。
    |
    */

    // ResetsPasswords トレイトを利用して、パスワードリセット機能を提供。
    use ResetsPasswords;

    /**
     * パスワードリセット後にリダイレクトするパスを定義。
     *
     * @var string
     */
    protected $redirectTo = '/home'; // パスワードリセット成功後、'/home' にリダイレクトする。
}