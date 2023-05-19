@extends('app')

@section('title', 'Reservas - Sistema de Reservas')

@section('styles')
    <link href="{{ asset('css/system/reservation.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section class="my-5 introduction">
        <div class="container">
            <div class="row">
                <h1>
                    Olá, <span>{{ $user->nm_usuario }}</span>
                </h1>
            </div>
        </div>
    </section>
    <section class="reservations">
        <div class="container">
            <div class="row">
                <h2 class="my-3">Faça sua reserva:</h2>
                <form method="POST" class="d-flex flex-wrap form-reservation">
                    @csrf
                    <div class="col-lg-4 col-12">
                        <input type="date" name="date_reservation" class="w-100" min="{{ \Carbon\Carbon::now()->toDateString() }}" value="{{ \Carbon\Carbon::now()->toDateString() }}" required>
                    </div>
                    <div class="col-lg-4 col-12 px-lg-4 mt-4 mt-lg-0">
                        <select name="hour_reservation" class="w-100" required>
                            <option value="18:00:00" selected>18:00</option>
                            <option value="19:00:00">19:00</option>
                            <option value="20:00:00">20:00</option>
                            <option value="21:00:00">21:00</option>
                            <option value="22:00:00">22:00</option>
                            <option value="23:00:00">23:00</option>
                        </select>
                    </div>
                    <button type="submit" class="col-lg-4 col-12 mt-4 mt-lg-0">
                        Verificar mesas disponíveis
                    </button>
                </form>
                <div class="available-tables mt-4" id="available-tables">
                    @foreach($tables as $table)
                        <div class="my-3 card-table">
                            <img src="{{ asset('images/sistema/mesas/' . $table->im_mesa) }}" class="w-100 object-fit-cover" alt="{{$table->im_mesa}}">
                            <div class="card-content d-flex flex-column justify-content-between align-items-start px-4">
                                <p class="my-3 table-description">{{$table->ds_mesa}}</p>
                                <p class="my-3 table-seats"><span>Quantidade de assentos:</span> {{$table->qt_assentos}}</p>
                                <button class="button-reservation my-3 col-12 text-center" data-table="{{$table->cd_mesa}}">Agendar reserva</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        const loadingTablesRoute = '{{ route('checktables') }}';
        const storeReservation = '{{ route('store') }}';
    </script>
    <script src="{{ asset('js/system/reservation.js') }}"></script>
@endsection
