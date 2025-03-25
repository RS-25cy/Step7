<?php

use Illuminate\Support\Facades\Route; // ✅ Routeファサードを使用できるようにインポート
use App\Http\Controllers\Auth\LoginController; // ✅ LoginControllerを使用できるようにインポート
use App\Http\Controllers\ProductController; // ✅ ProductControllerを使用できるようにインポート

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| ここでは、アプリケーションのWebルートを登録します。
| これらのルートは RouteServiceProvider によって読み込まれ、
| "web" ミドルウェアグループに含まれます。ここに新しいルートを追加できます。
|
*/

Route::get('/', function () {
    return view('welcome'); // ✅ ルートにアクセスしたときに `resources/views/welcome.blade.php` を表示
});

Auth::routes(); 
// ✅ Laravelが提供する認証機能（ログイン・ログアウト・パスワードリセット等）のルートを自動登録

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// ✅ `/home` にアクセスしたときに HomeController の index メソッドを実行し、'home' という名前をルートに付与

// ✅ 商品一覧ページ
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// → ProductController の `index` メソッドを実行し、商品一覧を表示

// ✅ 商品新規作成フォーム表示ページ
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// → `create` メソッドを実行し、新規作成画面を表示

// ✅ 商品詳細ページ
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// → {id}は動的パラメータ。特定の商品をIDで取得し、`show` メソッドで詳細を表示

// ✅ 商品登録処理
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// → POSTリクエストで送られたデータを `store` メソッドでデータベースに保存

// ✅ 商品編集フォーム表示ページ
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// → 編集対象の商品を `edit` メソッドで取得し、編集画面を表示

// ✅ 商品更新処理
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
// → PUTリクエストで送られたデータを `update` メソッドで更新

// ✅ 商品削除処理
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
// → DELETEリクエストで送られた商品を `destroy` メソッドで削除

Route::resource('products', ProductController::class);
// ✅ 上記のルートを一括登録
//   - index: GET /products
//   - create: GET /products/create
//   - store: POST /products
//   - show: GET /products/{id}
//   - edit: GET /products/{id}/edit
//   - update: PUT/PATCH /products/{id}
//   - destroy: DELETE /products/{id}