@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="card justify-content-center">
<table class="table">
                <thead class="table-light table-bordered">
                    <tr style="background-color: #6ab2ec">
                        <th scope="col" width="500px" style="text-align:center">SEJA BEM-VINDO AO PAINEL DE GESTÃO DE PARTES DIÁRIAS DA PETRA AGREGADOS</th>

                    </tr>
                </thead>
                <tbody>
                <tr>
                <td style="text-align:center">ESCOLHA AO LADO O EQUIPAMENTO QUE DESEJA REALIZAR A CONSULTA</td>
                </tr>
                </tbody>
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
                <form action="{{url("/data")}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="exampleInputData">Email: </label>
                        <input type="text" name="email" label="email" class="form-control">
                    </div>    
                    <div class="form-group">
                        <label for="exampleInputData">Data: </label>
                        <input type="date" name="data" label="Dia-Mes-Ano" class="form-control ">
                    </div>     
                 <button type="submit" class="btn btn-primary">Buscar</button>
            </form>        
        </div>
    </div>
</div>

@endsection
