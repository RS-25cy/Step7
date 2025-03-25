@extends('layouts.app')

@section('title', '商品編集')

@section('content')
<div class="container">
    <h2>商品編集</h2>

    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- 商品名 -->
        <label for="product_name">商品名</label><br>
        <input type="text" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}">
        @error('product_name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <!-- メーカー -->
        <label for="company_id">メーカー</label><br>
        <select id="company_id" name="company_id">
            <option value="">選択してください</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}" 
                    {{ old('company_id', $product->company_id) == $company->id ? 'selected' : '' }}>
                    {{ $company->company_name }}
                </option>
            @endforeach
        </select>
        @error('company_id')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <!-- 価格 -->
        <label for="price">価格</label><br>
        <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}">
        @error('price')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <!-- 在庫 -->
        <label for="stock">在庫</label><br>
        <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}">
        @error('stock')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <!-- コメント -->
        <label for="comment">コメント</label><br>
        <textarea id="comment" name="comment">{{ old('comment', $product->comment) }}</textarea>
        @error('comment')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <!-- 画像 -->
        <label for="img_path">画像</label><br>
        <input type="file" id="img_path" name="img_path">
        @error('img_path')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <!-- ✅ 「更新」ボタン -->
        <button type="submit" class="btn-submit">更新</button>

        <!-- ✅ 「戻る」ボタン -->
        <a href="{{ route('products.show', $product->id) }}" class="btn-back">戻る</a>
    </form>
</div>
@endsection