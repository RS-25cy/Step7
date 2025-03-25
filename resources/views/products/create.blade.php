@extends('layouts.app')

@section('title', '商品新規登録')

@section('content')
<div class="container">
    <h2>商品新規登録</h2>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- 商品名 -->
        <div>
            <label for="product_name">商品名</label>
            <input type="text" id="product_name" name="product_name" value="{{ old('product_name') }}">
            @error('product_name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <!-- メーカー -->
        <div>
            <label for="company_id">メーカー</label>
            <select id="company_id" name="company_id">
                <option value="">選択してください</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                        {{ $company->company_name }}
                    </option>
                @endforeach
            </select>
            @error('company_id')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <!-- 価格 -->
        <div>
            <label for="price">価格</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}">
            @error('price')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <!-- 在庫 -->
        <div>
            <label for="stock">在庫</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock') }}">
            @error('stock')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <!-- コメント -->
        <div>
            <label for="comment">コメント</label>
            <textarea id="comment" name="comment">{{ old('comment') }}</textarea>
            @error('comment')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <!-- 画像 -->
        <div>
            <label for="img_path">画像</label>
            <input type="file" id="img_path" name="img_path">
            @error('img_path')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <!-- ボタン -->
        <div class="button-group">
            <button type="submit" class="btn-submit">登録</button>

            <!-- 「戻る」ボタン -->
            <button type="button" class="btn-submit" onclick="location.href='{{ route('products.index') }}'">戻る</button>
        </div>

    </form>
</div>
@endsection