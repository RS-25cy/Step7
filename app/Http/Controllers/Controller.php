<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;  // ユーザーの認可を管理するための機能を使用
use Illuminate\Foundation\Bus\DispatchesJobs;  // ジョブのディスパッチ（キューの処理）機能を使用
use Illuminate\Foundation\Validation\ValidatesRequests;  // リクエストのバリデーション機能を使用
use Illuminate\Routing\Controller as BaseController;  // Laravelのコントローラーの基本クラス（BaseController）を継承

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;  // 認可、ジョブのディスパッチ、リクエストのバリデーションの機能をこのクラスに適用
}