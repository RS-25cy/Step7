<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;  // この行はコメントアウトされており、メール確認のインターフェイスを使用する場合はアンコメントする必要がある
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;  // UserモデルにAPIトークン、ファクトリ、通知機能を追加

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',     // `name` カラムを一括代入可能に設定
        'email',    // `email` カラムを一括代入可能に設定
        'password', // `password` カラムを一括代入可能に設定
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',      // パスワードはシリアライズ時に非表示
        'remember_token', // `remember_token` はシリアライズ時に非表示
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // `email_verified_at` をdatetime型にキャスト
    ];
}