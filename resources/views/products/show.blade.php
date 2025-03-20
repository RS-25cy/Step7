@extends('layouts.app')

@section('title', '商品詳細')

@section('content')
<div class="container">
    <h2>商品詳細</h2>
    
    <p><strong>商品名:</strong> {{ $product->product_name }}</p>
    <p><strong>メーカー:</strong> {{ $product->company ? $product->company->company_name : '未設定' }}</p>
    <p><strong>価格:</strong> ¥{{ number_format($product->price) }}</p>
    <p><strong>在庫:</strong> {{ $product->stock }}</p>
    <p><strong>コメント:</strong> {{ $product->comment }}</p>
    
    @if($product->img_path)
        <p><strong>画像:</strong></p>
        <img src="{{ asset('storage/' . $product->img_path) }}" alt="商品画像" width="200">
    @endif

    <!-- ✅ 「編集」ボタン -->
    <a href="{{ route('products.edit', $product->id) }}" class="btn-detail">編集</a>

    <!-- ✅ 「戻る」ボタン -->
    <a href="{{ route('products.index') }}" class="btn-detail">戻る</a>
</div>
@endsection