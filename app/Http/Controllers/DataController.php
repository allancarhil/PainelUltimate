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
            //dd($request->data);
            $api = new Api();
            $dataCorrigida =  date( 'd-m-Y' , strtotime($request->get("data")));
            $data="'".$dataCorrigida."'";
            //dd($data);
            $dados = $api->getAll("data/" . $data);
            //dd($dados);
            $excel = new ArrayExport($dados);
            $array = $excel->dados;
            
            
            //dd(new ArrayExport($array));
            return (new ArrayExport($array))->download("$dataCorrigida.xlsx");
        } catch (Exception $error) {
            return view('homeError', compact('error'));
        }
    }
}
