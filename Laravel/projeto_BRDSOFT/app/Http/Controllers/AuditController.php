<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuditController extends Controller{

    public function index(){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $audits = User::join('audits', 'users.id', '=', 'audits.user_id')
        ->orderBy('audits.id', 'ASC')
        ->SimplePaginate(10);

        return view('audit.index', compact('audits', 'auth'));

    }

    public function search(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $audits = Audit::join('users', 'users.id', '=', 'audits.user_id')
        ->whereAny([
            'audits.action',
            'audits.table',
            'audits.ip',
            'users.name'
        ], 'like', "$request->search_audits%")->get();

        return view('audit.index', compact('audits', 'auth'));

    }

    public function before(Request $request, $id){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $audit = Audit::find($id);

        $table = $request->table;

        return view('audit.show_before', compact('audit', 'auth', 'table'));

    }

    public function after(Request $request, $id){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $audit = Audit::find($id);

        $table = $request->table;

        return view('audit.show_after', compact('audit', 'auth', 'table'));

    }

}