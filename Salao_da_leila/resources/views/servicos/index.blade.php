@extends('layouts.app')

@section('content')
<style>
    .container {
        padding: 20px;
    }

    .card {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: #f8f9fa;
    }

    .card-header {
        background-color: #f8f9fa;
        border: none;
        font-size: 24px;
        color: #343a40;
        text-align: center;
    }

    .card-body {
        padding: 0;
    }

    .service-item {
        background-color: #fff;
        border-bottom: 1px solid #dee2e6;
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .service-item:hover {
        background-color: #f8f9fa;
    }

    .service-name {
        font-size: 18px;
        color: #343a40;
    }

    .btn-select-service {
        background-color: #e83e8c;
        color: #fff;
        border: none;
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-select-service:hover {
        background-color: #d6336c; 
    }

    form {
        display: flex;
        align-items: center;
    }

    input[type="date"],
    input[type="time"] {
        margin-right: 10px;
    }
</style>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Serviços Oferecidos</div>

                <div class="card-body">
                    <ul>
                        @foreach($servicos as $servico)
                            <li class="service-item">
                                <span class="service-name">{{ $servico->name }}</span>
                                <form action="{{ route('agendar_servico') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="servico_id" value="{{ $servico->id }}">
                                    <input type="date" name="data" required>
                                    <input type="time" name="hora" required>
                                    <button type="submit" class="btn btn-select-service">Agendar</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
