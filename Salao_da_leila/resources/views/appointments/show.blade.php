@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalhes do Agendamento</div>

                <div class="card-body">
                    <p><strong>ID do Agendamento:</strong> {{ $appointment->id }}</p>
                    <p><strong>Serviço Agendado:</strong> {{ $appointment->servico->name }}</p>
                    <p><strong>Data e Hora:</strong> {{ $appointment->date_and_time }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
