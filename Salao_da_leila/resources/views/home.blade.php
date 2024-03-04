@extends('layouts.app')

@section('content')
<style>
    .header {
        background-color: #f8f9fa;
        padding: 40px 20px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .header h1 {
        font-size: 36px;
        color: #343a40;
        margin-bottom: 10px;
    }

    .header p {
        font-size: 18px;
        color: #6c757d;
        margin-bottom: 0;
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
        padding: 20px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="header">
                <h1>Bem-vindo ao Salão de Beleza da Leila</h1>
                <p>Tratamentos personalizados para realçar a sua beleza</p>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bem vindo ') }}{{ Auth::user()->name }}{{ __(', selecione acima o desejado ') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
