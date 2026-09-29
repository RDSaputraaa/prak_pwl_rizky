@extends('layout.app')

@section('title', 'Daftar Pengguna')

@section('content')
    <x-user-table :users="$users" />
@endsection