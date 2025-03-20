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
}