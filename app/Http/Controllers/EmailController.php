<?php

namespace App\Http\Controllers;

use App\Mail\newparteDiaria;
use Illuminate\Support\Facades\Mail;
use App\Models\Api;
use App\Exports\ArrayExport;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        return view('envio-email');
    }

    public function sendEmail(Request $request)
    {
        $email = $request->email;
        //requisição de equipamentos na api
        $api = new Api();
        $dataCorrigida =  date('d-m-Y', strtotime($request->data));
        $data = "'" . $dataCorrigida . "'";

        $dados = $api->getAll("data/" . $data);
        //formata os dados tirando os arrays vazios
        $result = new ArrayExport($dados);

        $user = new \stdClass();
        $user->email = $email;

        Mail::send(new newparteDiaria($user, $result));
    }
}
