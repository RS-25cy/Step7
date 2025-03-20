<?php

namespace App\Http\Controllers;

use App\Models\Product;          // Productモデルをインポート
use App\Models\Company;          // Companyモデルをインポート
use App\Http\Requests\ProductRequest; // ProductRequest(リクエストバリデーション)をインポート

class ProductController extends Controller
{
    // 商品一覧画面を表示
    public function index()
    {
        // 検索キーワードとメーカーIDを取得
        $keyword = request('keyword');     // URLパラメータから'keyword'を取得
        $companyId = request('company_id'); // URLパラメータから'company_id'を取得

        // 商品一覧を取得（メーカー情報を一緒に取得）
        $products = Product::with('company') // リレーション先のcompanyを事前に読み込む
            ->when($keyword, function ($query) use ($keyword) {
                // キーワードがある場合、商品名に対して部分一致検索を行う
                $query->where('product_name', 'LIKE', "%{$keyword}%");
            })
            ->when($companyId, function ($query) use ($companyId) {
                // メーカーIDがある場合、そのメーカーの商品に絞り込む
                $query->where('company_id', $companyId);
            })
            ->get(); // 最終的にデータベースから結果を取得

        // メーカー情報をすべて取得
        $companies = Company::all();

        // 商品一覧ビューを表示し、$productsと$companiesを渡す
        return view('products.index', compact('products', 'companies'));
    }

    // 商品作成フォームを表示
    public function create()
    {
        // メーカー情報をすべて取得
        $companies = Company::all();
        
        // 商品作成ビューを表示し、メーカー情報を渡す
        return view('products.create', compact('companies'));
    }

    // 商品詳細を表示
    public function show($id)
    {
        // 指定されたIDの商品情報を取得（メーカー情報も一緒に取得）
        $product = Product::with('company')->findOrFail($id);
        
        // 商品詳細ビューを表示し、商品情報を渡す
        return view('products.show', compact('product'));
    }

    // 商品の新規登録処理
    public function store(ProductRequest $request)
    {
        // Productモデルに定義したcreateProductメソッドを使って商品を登録
        Product::createProduct($request->validated()); // バリデーション済みデータを渡す

        // 商品一覧ページにリダイレクトし、完了メッセージを表示
        return redirect()->route('products.index')->with('success', '商品を登録しました！');
    }

    // 商品編集フォームを表示
    public function edit($id)
    {
        // 指定されたIDの商品情報を取得
        $product = Product::findOrFail($id);
        
        // メーカー情報をすべて取得
        $companies = Company::all();
        
        // 商品編集ビューを表示し、商品情報とメーカー情報を渡す
        return view('products.edit', compact('product', 'companies'));
    }

    // 商品情報の更新処理
    public function update(ProductRequest $request, $id)
    {
        // 指定されたIDの商品情報を取得
        $product = Product::findOrFail($id);
        
        // Productモデルに定義したupdateProductメソッドを使って商品を更新
        $product->updateProduct($request->validated()); // バリデーション済みデータを渡す

        // 商品詳細ページにリダイレクトし、完了メッセージを表示
        return redirect()->route('products.show', $id)->with('success', '商品情報を更新しました！');
    }

    // 商品削除処理
    public function destroy($id)
    {
        // 指定されたIDの商品情報を取得
        $product = Product::findOrFail($id);
        
        // Productモデルに定義したdeleteProductメソッドを使って商品を削除
        $product->deleteProduct();

        // 商品一覧ページにリダイレクトし、削除完了メッセージを表示
        return redirect()->route('products.index')->with('success', '商品を削除しました');
    }
}