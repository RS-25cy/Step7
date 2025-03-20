<?php

// 名前空間の宣言: このクラスが属する場所を示す。
// Authディレクトリにあることを示している。
namespace App\Http\Controllers\Auth;

// 基底コントローラーの読み込み: Laravelの基本的なコントローラー機能を利用するために継承する。
use App\Http\Controllers\Controller;

// パスワード確認に必要な機能を提供するトレイトを読み込む。
use Illuminate\Foundation\Auth\ConfirmsPasswords;

// パスワード確認を担当するコントローラーの定義
class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller（パスワード確認コントローラー）
    |--------------------------------------------------------------------------
    |
    | このコントローラーは、パスワード確認を処理します。
    | ConfirmsPasswordsトレイトを利用して基本的な機能を提供しています。
    | 必要に応じてこのトレイトのメソッドをオーバーライドしてカスタマイズできます。
    |
    */

    // ConfirmsPasswordsトレイトを使用することで、パスワード確認の基本機能を取り込む。
    use ConfirmsPasswords;

    /**
     * パスワード確認後にリダイレクトするパスを定義。
     *
     * @var string
     */
    protected $redirectTo = '/home'; // パスワード確認後に "/home" にリダイレクトする。

    /**
     * コントローラーのインスタンスを生成。
     *
     * @return void
     */
    public function __construct()
    {
        // 'auth' ミドルウェアを適用し、未認証ユーザーのアクセスを防止。
        $this->middleware('auth');
    }
}
