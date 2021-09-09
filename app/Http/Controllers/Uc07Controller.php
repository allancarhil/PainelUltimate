<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use PDF;
use App\Models\Api;
use App\Exports\ExportExcelId;
use App\Exports\ExportExcelData;
use App\Exports\ExportExcel;
use Maatwebsite\Excel\Facades\Excel as Excel;

class Uc07Controller extends Controller{
    public function index(){
        try{
            $api = new Api();
            $dados = $api->getAll("uc07");

            return view('uc07.list', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }

    public function index2(){
        try{
            $api = new Api();
            $dados = $api->getAll("uc07");

            return view('uc07.prelist', compact('dados'));
        }catch(Exception $error ){
            return view('error', compact('error'));
        }
    }

    #Função pega a data passada por parametro, consulta os dados no banco e retorna pra view
    public function data(Request $request){

        

        try{
            $data =  date( 'd-m-Y' , strtotime($request->get("data")));
            $api = new Api();
            $dados = $api->getAll("uc07/data/" . $data);

            return view('uc07.list', compact('dados'));
            
        }catch(Exception $error ){
            return view('error', compact('error'));

        }
    }

    #função chama o formulário
    public function form(){
        return view('uc07.form');

    }

    public function exportPDF($id){
        try{
            $api = new Api();
            $d = $api->getAll("uc07/" . $id);
                
            $pdf = PDF::loadView('uc07.pdf', compact('d'))->setOptions(['isRemoteEnabled' => TRUE,'dpi' => 110, 'defaultFont' => 'sans-serif'])->setPaper('a4');
            return $pdf->stream('uc07-relatorio.pdf', array("Attachment" => true));

        }catch(Exception $error ){
            return view('error', compact('error'));
            
        } 
    }
    public function exportExcelId($equipamento, $id){
        try{
            return Excel::download(new ExportExcelId($equipamento, $id), "{$equipamento}-{$id}.xlsx");
        }catch(Exception $error){
            echo  $error;
        }
    }

    public function exportExcelData($equipamento, $data){
        try{
            return Excel::download(new ExportExcelData($equipamento, $data), "{$equipamento}-{$data}.xlsx");
        }catch(Exception $error){
            echo  $error;
        }
    }

    public function exportExcel($equipamento){
        try{
           return Excel::download(new ExportExcel($equipamento), "{$equipamento}-todos.xlsx");
        }catch(Exception $error){
            echo  $error;
        }
    }
}
