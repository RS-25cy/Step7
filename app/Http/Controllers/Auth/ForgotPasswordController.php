<?php

// 名前空間を定義：このクラスが所属するディレクトリを示す。
// Authディレクトリにあることを示している。
namespace App\Http\Controllers\Auth;

// 基底コントローラーを読み込む：Laravelの基本的なコントローラー機能を利用するために必要。
use App\Http\Controllers\Controller;

// パスワードリセットメール送信を行うトレイトを読み込む。
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

// パスワードリセット用のメール送信を担当するコントローラーの定義。
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller（パスワードリセットコントローラー）
    |--------------------------------------------------------------------------
    |
    | このコントローラーはパスワードリセットメールを処理します。
    | SendsPasswordResetEmails トレイトを使用し、ユーザーへの
    | パスワードリセット通知を簡単に送信できます。
    |
    */

    // SendsPasswordResetEmailsトレイトを使用することで、パスワードリセットメール送信機能を利用可能にする。
    use SendsPasswordResetEmails;
}