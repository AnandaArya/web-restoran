
@extends('layout/main')

@section('title', 'Halaman Utama')

@section('inlineCSS')
<style>

</style>
@endsection


@section('container')

    <div class="h2">Halaman Utama</div>

    <a href="{{ url('/halaman-satu') }}">halaman-satu</a>
    <br>
    <a href="{{ url('/halaman-dua') }}">halaman-dua</a>
    <br>
    <a href="{{ url('/logout') }}">logout</a>

@endsection

