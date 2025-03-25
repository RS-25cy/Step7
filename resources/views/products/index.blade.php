@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
<div class="container">
    <h2>商品一覧</h2>

    <!-- 検索フォーム -->
    <form method="GET" action="{{ route('products.index') }}">
        <input type="text" name="keyword" placeholder="キーワードを入力">
        
    <!-- メーカー検索の追加 -->
        <select name="company_id">
            <option value="">全メーカー</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}" {{ request('company_id') == $company->id ? 'selected' : '' }}>
                    {{ $company->company_name }}
                </option>
            @endforeach
        </select>

        <!-- ✅ 検索ボタンを詳細・削除ボタンと統一 -->
        <button type="submit" class="btn-detail">検索</button>

        <!-- ✅ 新規登録ボタンも統一 -->
        <button type="button" class="btn-detail" onclick="location.href='{{ route('products.create') }}'">新規登録</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫</th>
                <th>メーカー</th> 
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    @if ($product->img_path)
                        <img src="{{ asset('storage/' . $product->img_path) }}" alt="商品画像" width="50">
                    @else
                        <span>画像なし</span>
                    @endif
                </td>
                <td>{{ $product->product_name }}</td>
                <td>¥{{ number_format($product->price) }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company ? $product->company->company_name : '未設定' }}</td>
                <td>
                    <!-- ✅ 詳細ボタン -->
                    <form action="{{ route('products.show', $product->id) }}" method="GET" style="display:inline;">
                        <button type="submit" class="btn-detail">詳細</button>
                    </form>

                    <!-- ✅ 削除ボタン -->
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('本当に削除しますか？');">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection