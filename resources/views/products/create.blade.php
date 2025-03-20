@extends('layouts.app')

@section('title', '商品新規登録')

@section('content')
<div class="container">
    <h2>商品新規登録</h2>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="product_name">商品名</label>
            <input type="text" id="product_name" name="product_name" required>
        </div>

        <div>
            <label for="company_id">メーカー</label>
            <select id="company_id" name="company_id" required>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="price">価格</label>
            <input type="number" id="price" name="price" required>
        </div>

        <div>
            <label for="stock">在庫</label>
            <input type="number" id="stock" name="stock" required>
        </div>

        <div>
            <label for="comment">コメント</label>
            <textarea id="comment" name="comment"></textarea>
        </div>

        <div>
            <label for="img_path">画像</label>
            <input type="file" id="img_path" name="img_path">
        </div>

        <div class="button-group">
            <button type="submit" class="btn-submit">登録</button>

            <!-- ✅ 「戻る」ボタンのデザイン統一 -->
            <button type="button" class="btn-submit" onclick="location.href='{{ route('products.index') }}'">戻る</button>
        </div>

    </form>
</div>
@endsection