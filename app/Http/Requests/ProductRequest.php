<?php

namespace App\Http\Requests; // App\Http\Requests 名前空間に属する

use Illuminate\Foundation\Http\FormRequest; // FormRequest クラスを継承するためにインポート

// ProductRequest クラスを定義（フォームリクエストによるバリデーションを担当）
class ProductRequest extends FormRequest
{
    // ユーザーがこのリクエストを実行できるかどうかを判断
    public function authorize(): bool
    {
        return true; // 認可を常に許可（すべてのユーザーがこのリクエストを使用可能）
    }

    // リクエストに対するバリデーションルールを定義
    public function rules(): array
    {
        return [
            // 'product_name' は必須、文字列、最大255文字まで
            'product_name' => 'required|string|max:255',

            // 'company_id' は必須、companiesテーブルのidカラムに存在する値でなければならない
            'company_id' => 'required|exists:companies,id',

            // 'price' は必須、数値、0以上の値でなければならない
            'price' => 'required|numeric|min:0',

            // 'stock' は必須、整数、0以上の値でなければならない
            'stock' => 'required|integer|min:0',

            // 'comment' は任意、文字列である必要がある（nullable で入力なしも許容）
            'comment' => 'nullable|string',

            // 'img_path' は任意、画像ファイル、jpeg・png・jpg・gif のいずれか、最大2MBまで
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    // バリデーションエラーメッセージをカスタマイズ
    public function messages(): array
    {
        return [
            'product_name.required' => '商品名は必須です。',
            'product_name.string'   => '商品名は文字列で入力してください。',
            'product_name.max'      => '商品名は255文字以内で入力してください。',

            'company_id.required'   => 'メーカーを選択してください。',
            'company_id.exists'     => '選択されたメーカーが存在しません。',

            'price.required'        => '価格は必須です。',
            'price.numeric'         => '価格は数値で入力してください。',
            'price.min'             => '価格は0円以上で入力してください。',

            'stock.required'        => '在庫数は必須です。',
            'stock.integer'         => '在庫数は整数で入力してください。',
            'stock.min'             => '在庫数は0以上で入力してください。',

            'comment.string'        => 'コメントは文字列で入力してください。',

            'img_path.image'        => '画像ファイルを選択してください。',
            'img_path.mimes'        => '画像はjpeg、png、jpg、gif形式のみ対応しています。',
            'img_path.max'          => '画像サイズは2MB以内でアップロードしてください。',
        ];
    }
}
    