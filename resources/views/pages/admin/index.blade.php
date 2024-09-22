@extends('layout.pegawai.main')
@section('title')
    @if (Auth::user()->role == 0)
    
    Dashboard || Admin
    @elseif (Auth::user()->role == 1)
    Dashboard || Pegawai
    @endif
@endsection
@section('pages')
Dashboard
@endsection
@section('content')
<div class="container-fluid py-4">
    Hello Selamat Datang {{Auth::user()->name}}
</div>
@endsection