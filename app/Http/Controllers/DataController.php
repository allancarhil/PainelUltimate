<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabecalhos;
use App\Exports\ArrayExport;
use App\Exports\ExportExcel;
use Exception;
use App\Models\Api;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Maatwebsite\Excel\HeadingRowImport;
use PDF;

class DataController extends Controller
{




    public function exportExcel(Request $request)
    {
        try {
            $api = new Api();
            $dataCorrigida =  date('d-m-Y', strtotime($request->get("data")));
            $data = "'" . $dataCorrigida . "'";

            $dados = $api->getAll("data/" . $data);

            $excel = new ArrayExport($dados);
            $array = $excel->dados;

            return (new ArrayExport($array))->download("$dataCorrigida.xlsx");
        } catch (Exception $error) {
            return view('homeError', compact('error'));
        }
    }
}
