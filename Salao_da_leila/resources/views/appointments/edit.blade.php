@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Agendamento</div>

                    <div class="card-body">
                        <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="service">Serviço:</label>
                                <input type="text" id="service" name="service" class="form-control" value="{{ $appointment->servico->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="date">Data:</label>
                                <input type="date" id="date" name="date" class="form-control" value="{{ $appointment->data }}">
                            </div>
                            <div class="form-group">
                                <label for="time">Hora:</label>
                                <input type="time" id="time" name="time" class="form-control" value="{{ $appointment->hora }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
