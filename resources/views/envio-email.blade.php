@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="card justify-content-center">
        <table class="table">
            <tr>
                <td style="text-align:center">INSIRA ENDEREÇO DE EMAIL DESEJADO E DATA PARA ENVIAR RELATÓRIO POR E-MAIL</td>
            </tr>
        </table>
    </div>
</div>

<div class="container">
    <div class="card justify-content-center">

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="form-group" style="display:grid;">
                <form action="{{url('/envio-email')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputData">Email: </label>
                        <input type="email" name="email" id="email" class="form-control ">
                        <label for="exampleInputData">Data: </label>
                        <input type="date" name="data" label="Dia-Mes-Ano" class="form-control ">
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection