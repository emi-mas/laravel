{{-- 継承 --}}
@extends('layouts.base')
{{-- タイトル --}}
@section('title', '仕入管理')
{{-- ヘッダ部 --}}
@section('active_shiire', 'active')
{{-- メイン部 --}}
@section('content')
    @parent
    <form action="/shiire/create" method="POST">
        @csrf
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>項⽬</th>
                    <th>入⼒</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>商品名</th>
                    <td>
                        <input type="text" name="shohin_name" value="{{ old('shohin_name') }}" />
                        @error('shohin_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>仕入数</th>
                    <td>
                        <input type="text" name="shiire_count" value="{{ old('shiire_count') }}" />
                        @error('shiire_count')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>仕入⽇</th>
                    <td>
                        <input type="date" name="shiire_date" value="{{ old('shiire_date') }}" />
                        @error('shiire_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>仕入額</th>
                    <td>
                        <input type="text" name="shiire_amount" value="{{ old('shiire_amount') }}" />
                        @error('shiire_amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">送信</button>
    </form>
@endsection
