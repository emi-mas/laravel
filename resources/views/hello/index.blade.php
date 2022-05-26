@component('component.sample')
    @slot('name')
        テスト<br />太郎
    @endslot
@endcomponent
{{-- {{-- @include('component.sample', ['name' => 'テスト<br />太郎']) --}}

@php
    $data = [
        ['name' => '太郎'],
        ['name' => '次郎'],
        ['name' => '三郎']
    ];
@endphp
<p>名前</p>
<ul>
    @each('component.each', $data, 'item')
</ul>

@extends('layouts.base')
@section('title', $path)
@section('menuber')
    @parent
    Hello World
@endsection
@section('card-title', 'Welcome!!')
@section('card-text')
    現在アクセスしているパス<br />
    {{ $path }}
@endsection
