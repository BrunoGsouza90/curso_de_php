<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use SplFileInfo;

class ReportController extends Controller{
    
    public function index(){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $users = User::where('name', '<>', 'Admin')->get();

        return view('report.index', compact('users', 'auth'));

    }

    public function search(Request $request){


        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(empty($request->data_inicial) && empty($request->data_final)){

            if($request->status == 'Todos'){

                $users = User::where('name', '<>', 'Admin')->get();

                return view('report.index', compact('users', 'auth'));
    
            }
    
            $users = User::where('name', '<>', 'Admin')
            ->where('status', '=', $request->status)
            ->where('name', '<>', 'Admin')->get();
    
            return view('report.index', compact('users', 'auth'));

        } else {

            if(empty($request->data_inicial)){

                $request['data_inicial'] = date("Y-m-d");
    
            }
    
            if(empty($request->data_final)){
    
                $request['data_final'] = date("Y-m-d");
    
            }
    
            if(empty($request->hora_inicial)){
    
                $request['hora_inicial'] = date("h:i");
    
            }
    
            if(empty($request->hora_final)){
    
                $request['hora_final'] = date("h:i");
    
            }

            if($request->status == 'Todos'){

                $users = User::whereBetween('created_at', ["$request->data_inicial $request->hora_inicial", "$request->data_final $request->hora_final"])
                ->where('name', '<>', 'Admin')->get();
    
                return view('report.index', compact('users', 'auth'));
    
            }
    
            $users = User::whereBetween('created_at', ["$request->data_inicial $request->hora_inicial", "$request->data_final $request->hora_final"])
            ->where('status', '=', $request->status)
            ->where('name', '<>', 'Admin')->get();
    
            return view('report.index', compact('users', 'auth'));

        }

    }

    public function csv(Request $request){
        
        $data = $request->all();

        $ds = DIRECTORY_SEPARATOR;

        if(!empty($data['data_inicial']) && !empty($data['data_final'])){

            $name_file = "Users $data[data_inicial] $data[hora_inicial] $data[data_final] $data[hora_final]";

        } else {

            $date = date('Ymdhms');

            $name_file = "Users$date";

        }

        $dados = json_decode($request->users, true);

        $csv = storage_path("app" . $ds . "public" . $ds . "documents" . $ds . $name_file . ".csv");

        $file = new SplFileInfo($csv);

        if(!file_exists($csv)){

            $csv = fopen($csv, 'x');

        } else {

            $csv = fopen($csv, 'w');

        }

        $fields = ['#' ,'Nome', 'Login', 'CPF/CNPJ', 'Status', 'State', 'City', 'Telephone', 'Email', 'Data de criação'];

        fputcsv($csv, $fields, ',', '"', '');

        foreach($dados as $user){

            foreach(['roles', 'email_verified_at', 'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_confirmed_at', 'updated_at'] as $item){

                unset($user["$item"]);

            }

            $ano = substr($user['created_at'], 0, 4);
            $mes = substr($user['created_at'], 5, 2);
            $dia = substr($user['created_at'], 8, 2);
            $hora = substr($user['created_at'], 11, 8);

            $user['created_at'] = "$dia/$mes/$ano - $hora";

            fputcsv($csv, $user, ',', '"', '');

        }

        fclose($csv);

        return response()->download($file)->deleteFileAfterSend(true);

    }

    public function pdf(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $users = json_decode($request->users);

        $data = [
            
            'auth' => $auth,
            'users' => $users,
            'css' => "/css/style.css"
    
        ];

        $pdf = Pdf::loadView('report.table_users', $data);

        if(!empty($request->data_inicial) && !empty($request->data_final)){

            $name_file = "Users $request->data_inicial $request->hora_inicial $request->data_final $request->hora_final";

        } else {

            $date = date('Ymdhms');

            $name_file = "Users$date";

        }

        return $pdf->download("$name_file.pdf");

    }

}