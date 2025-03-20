<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;  // モデルにファクトリを使用するため、HasFactoryトレイトをインポート

    protected $fillable = [
        'company_name',    // `company_name` カラムを一括代入可能に設定
        'representative_name',  // `representative_name` カラムを一括代入可能に設定
        'street_address',  // `street_address` カラムを一括代入可能に設定
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'company_id'); 
        // この会社（Company）には複数の製品（Product）が関連しており、'company_id'で結びついている
    }    
}