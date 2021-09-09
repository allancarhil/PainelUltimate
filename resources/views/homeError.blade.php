@extends('adminlte::page')

@section('content')

    <div class="container">
        <div class="card justify-content-center">
            <table class="table">
                <thead class="table-light table-bordered">
                    <tr style="background-color: #6ab2ec">
                        <th scope="col" width="500px" style="text-align:center">ERRO
                            <a class="btn btn-light" href="{{ url('/home') }}"
                                style="color:#000000;float:right;">Voltar</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:center">NÃO HÁ INFORMAÇÕES DISPONÍVEIS PARA A DATA ESCOLHIDA</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    
@endsection
