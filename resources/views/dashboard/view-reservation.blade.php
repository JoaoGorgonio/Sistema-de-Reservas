@extends('app')

@section('title', 'Dashboard - Sistema de Reservas')

@section('styles')
    <link href="{{ asset('css/dashboard/dashboard.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section class="my-5 pb-lg-5 reservations">
        <div class="container">
            <div class="row">
                <h1>
                    Olá, <span>{{ $user->nm_usuario }}</span>
                </h1>
                @if ($reservations->count() > 0)
                    <h2 class="mt-5">Reservas cadastradas:</h2>
                    <table class="table-reservation mt-4 text-center">
                        <thead>
                            <tr>
                                <th>Nome do Reservista</th>
                                <th>Número da Mesa</th>
                                <th>Data da Reserva</th>
                                <th>Hora da Reserva</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->user->nm_usuario }}</td>
                                    <td>{{ $reservation->cd_mesa }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservation->dt_reserva)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservation->hr_reserva)->format('H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Não existem reservas cadastradas no momento.</p>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    {{-- <script src="{{ asset('js/dashboard/dashboard.js') }}"></script> --}}
@endsection
