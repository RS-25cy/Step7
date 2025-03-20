<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Sale extends Model
{
    use HasFactory;  // モデルにファクトリを使用するため、HasFactoryトレイトをインポート

    protected $fillable = [
        'product_id',    // `product_id` カラムを一括代入可能に設定
        'quantity',      // `quantity` カラムを一括代入可能に設定
        'total_price',   // `total_price` カラムを一括代入可能に設定
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); // SaleモデルはProductモデルに対して多対1（多くの販売が1つの製品に属する）で関連しており、`product_id`で結びついている
    }
}