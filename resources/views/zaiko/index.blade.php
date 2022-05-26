@extends('layouts.base')
@section('title', '在庫管理')
@section('content')
    @parent
    <p>現在時刻(ハワイ時間): {{$honolulu_datetime}}</p>
    <p id="after"></p> {{-- ⽬印 --}}
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>商品No.</th>
                <th>商品名</th>
                <th>在庫数</th>
                <th>販売価格</th>
                <th>最終仕入日時</th>
                <th>最終販売日時</th>
            </tr>
        </thead>
        <tbody>
            @each('component.each', $items, 'items')
        </tbody>
    </table>
@endsection
