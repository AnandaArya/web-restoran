
@extends('layout/main')

@section('title', 'Halaman Utama')

@section('inlineCSS')
<style>

</style>
@endsection


@section('container')

    <div class="h2">Halaman Utama</div>

    <a href="{{ url('/logout') }}">logout</a>

@endsection

