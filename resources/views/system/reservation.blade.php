@extends('app')

@section('title', 'Reservas - Sistema de Reservas')

@section('styles')
    <link href="{{ asset('css/system/reservation.css') }}" rel="stylesheet">
@endsection

@section('content')
    <header>
        <p>alooo</p>
        <a href="{{route('logout')}}">logout</a>
    </header>
@endsection

@section('scripts')
    {{-- <script src="{{ asset('js/system/reservation.js') }}"></script> --}}
@endsection
