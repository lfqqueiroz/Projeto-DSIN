@extends('layouts.app')

@section('content')
<style>
    .container {
        padding: 20px;
    }

    .card {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

    .table {
        width: 100%;
        margin-bottom: 0;
        color: #212529;
        background-color: #fff; 
        border-collapse: collapse; 
    }

    .table th,
    .table td {
        padding: 12px;
        vertical-align: middle;
        border-top: 1px solid #dee2e6;
        text-align: center;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
        background-color: #f8f9fa;
        font-weight: bold;
        color: #343a40;
    }

    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .btn {
        padding: 6px 12px;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-edit {
        background-color: #007bff;
        color: #fff;
        border: none;
        margin-right: 5px;
    }

    .btn-edit:hover {
        background-color: #0056b3;
    }

    .btn-delete {
        background-color: #dc3545;
        color: #fff;
        border: none;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    .btn-group {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .acoes-header {
        text-align: center;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Meus Agendamentos</div>

                <div class="card-body">
                    @if ($agendamentos->isEmpty())
                        <p>Você ainda não agendou nenhum serviço.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Serviço</th>
                                    <th>Data</th>
                                    <th>Hora</th>
                                    <th class="acoes-header">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agendamentos as $agendamento)
                                    <tr>
                                        <td>{{ $agendamento->servico->name }}</td>
                                        <td>{{ date('d/m/Y', strtotime($agendamento->data)) }}</td>
                                        <td>{{ $agendamento->hora }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('appointments.edit', $agendamento->id) }}" class="btn btn-edit">Editar</a>
                                                <form action="{{ route('appointments.destroy', $agendamento->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-delete">Apagar</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
