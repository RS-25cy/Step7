<?php

// 名前空間の指定：このクラスが属するディレクトリを示す。
// Authディレクトリ内にあることを表している。
namespace App\Http\Controllers\Auth;

// 基底コントローラーをインポート。
// すべてのコントローラーが継承するベースクラスを利用可能にする。
use App\Http\Controllers\Controller;

// ルートのリダイレクト先を管理するクラスをインポート。
// ユーザー登録後のリダイレクト処理に利用。
use App\Providers\RouteServiceProvider;

// Userモデルをインポート。
// ユーザー登録時にデータベースへ保存するために使用。
use App\Models\User;

// ユーザー登録機能を提供するトレイトをインポート。
// 登録処理の基本機能を実装している。
use Illuminate\Foundation\Auth\RegistersUsers;

// パスワードをハッシュ化するためのヘルパーをインポート。
use Illuminate\Support\Facades\Hash;

// バリデーションを行うためのヘルパーをインポート。
use Illuminate\Support\Facades\Validator;

// HTTPリクエストを扱うためのクラスをインポート。
use Illuminate\Http\Request;

// 登録イベントを発行するためのクラスをインポート。
// ユーザー登録時にイベントを発火させるために使用。
use Illuminate\Auth\Events\Registered;

// ユーザー登録を管理するコントローラーを定義。
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller（ユーザー登録コントローラー）
    |--------------------------------------------------------------------------
    |
    | このコントローラーは新規ユーザー登録、バリデーション、データベースへの
    | 保存処理を担当します。RegistersUsersトレイトを使って基本機能を実装します。
    |
    */

    // RegistersUsers トレイトを利用して登録機能を提供。
    use RegistersUsers;

    /**
     * ユーザー登録後にリダイレクトするパスを定義。
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    // 上記コードはコメントアウトされており、登録後のリダイレクトは手動で制御。

    /**
     * 新しいコントローラーインスタンスを作成。
     *
     * @return void
     */
    public function __construct()
    {
        // ゲスト（未認証ユーザー）のみアクセスを許可。
        // 既にログインしているユーザーはアクセスできないようにする。
        $this->middleware('guest');
    }

    /**
     * ユーザー登録リクエストのバリデーションを実行。
     *
     * @param  array  $data  ユーザーからの入力データ。
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // ユーザー登録の入力内容に対するバリデーションを実行。
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],              // 必須、文字列、最大255文字
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // 必須、メール形式、一意性制約
            'password' => ['required', 'string', 'min:8', 'confirmed'], // 必須、8文字以上、確認用パスワードと一致
        ]);
    }

    /**
     * ユーザー登録処理を実行。
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // バリデーションを実行し、エラーがある場合はリダイレクト。
        $this->validator($request->all())->validate();

        // Registeredイベントを発火させ、ユーザー登録後の処理を実行。
        event(new Registered($user = $this->create($request->all())));

        // 登録完了後にログインせず、ログインページにリダイレクト。
        return redirect('/login');
    }

    /**
     * バリデーション成功後に新しいユーザーをデータベースに保存。
     *
     * @param  array  $data  ユーザーからの入力データ。
     * @return \App\Models\User  新規作成されたユーザーインスタンスを返す。
     */
    protected function create(array $data)
    {
        // 新しいユーザーを作成し、データベースに保存。
        return User::create([
            'name' => $data['name'], // ユーザー名を保存
            'email' => $data['email'], // メールアドレスを保存
            'password' => Hash::make($data['password']), // パスワードをハッシュ化して保存
        ]);
    }

    /**
     * 登録完了後のリダイレクト処理（オーバーライド可能）。
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
    // protected function registered(Request $request, $user)
    // {
    //     // 登録後にログインページにリダイレクト。
    //     return redirect('/login');
    // }
}