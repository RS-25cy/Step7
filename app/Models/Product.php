<?php

namespace App\Models; // モデルが属する名前空間を定義

use Illuminate\Database\Eloquent\Factories\HasFactory; // ファクトリを利用するためにインポート
use Illuminate\Database\Eloquent\Model; // Eloquentモデルの基本機能を提供するクラスをインポート

// Product モデルを定義（products テーブルと対応）
class Product extends Model
{
    use HasFactory; // ファクトリを使用できるようにする

    // create() や update() メソッドで一括代入を許可するカラムを指定
    protected $fillable = [
        'company_id',   // 会社ID
        'product_name', // 商品名
        'price',        // 価格
        'stock',        // 在庫数
        'comment',      // コメント
        'img_path',     // 画像のパス
    ];

    /**
     * 商品が持つ売上のリレーションを定義
     * 1つの商品に対して複数の売上が存在する（1対多の関係）
     */
    public function sales()
    {
        // Saleモデルとの1対多の関係を定義（外部キーは product_id）
        return $this->hasMany(Sale::class, 'product_id');
    }

    /**
     * 商品が所属する会社のリレーションを定義
     * 商品は1つの会社に所属する（多対1の関係）
     */
    public function company()
    {
        // Companyモデルとの多対1の関係を定義（外部キーは company_id）
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * 商品作成メソッド
     * 新しい商品をデータベースに登録する
     *
     * @param array $data 商品データ
     * @return Product 登録された商品インスタンスを返す
     */
    public static function createProduct($data)
    {
        // 画像がアップロードされている場合、storageに保存しパスを取得
        if (isset($data['img_path'])) {
            $data['img_path'] = $data['img_path']->store('images', 'public');
        }
        
        // 商品を作成し、作成された商品インスタンスを返す
        return self::create($data);
    }

    /**
     * 商品更新メソッド
     * 既存の商品情報を更新する
     *
     * @param array $data 更新データ
     * @return bool 更新が成功したかどうかを返す
     */
    public function updateProduct($data)
    {
        // 画像がアップロードされている場合、storageに保存しパスを取得
        if (isset($data['img_path'])) {
            $data['img_path'] = $data['img_path']->store('images', 'public');
        }

        // 商品情報を更新し、更新成功時は true を返す
        return $this->update($data);
    }

    /**
     * 商品削除メソッド
     * 商品をデータベースから削除する
     *
     * @return bool 削除が成功したかどうかを返す
     */
    public function deleteProduct()
    {
        // 商品を削除し、削除成功時は true を返す
        return $this->delete();
    }
}