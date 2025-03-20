@extends('layouts.app')

@section('title', '商品編集')

@section('content')
<div class="container">
    <h2>商品編集</h2>
    
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="product_name">商品名</label><br>
        <input type="text" id="product_name" name="product_name" value="{{ $product->product_name }}" required><br>

        <label for="company_id">メーカー</label><br>
        <select name="company_id">
            @foreach ($companies as $company)
                <option value="{{ $company->id }}" 
                    {{ $product->company_id == $company->id ? 'selected' : '' }}>
                    {{ $company->company_name }}
                </option>
            @endforeach
        </select><br>

        <label for="price">価格</label><br>
        <input type="number" id="price" name="price" value="{{ $product->price }}" required><br>

        <label for="stock">在庫</label><br>
        <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required><br>

        <label for="comment">コメント</label><br>
        <textarea id="comment" name="comment">{{ $product->comment }}</textarea><br>

        <label for="img_path">画像</label><br>
        <input type="file" id="img_path" name="img_path"><br><br>
        
        <!-- ✅ 「更新」ボタン -->
        <button type="submit" class="btn-submit">更新</button>

        <!-- ✅ 「戻る」ボタン -->
        <a href="{{ route('products.show', $product->id) }}" class="btn-back">戻る</a>
    </form>
</div>
@endsection