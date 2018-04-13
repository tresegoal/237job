<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Illuminate\http\Response;

class JobsFiltreController extends Controller
{
    public function filtreType($id) {

        $joblists =Job::with('Category')
            ->with('Ville')
            ->with('Type')
            ->with('Salaire')
            ->with('User')
            ->where('type_id', $id)
            ->limit(5)
            ->orderBy('updated_at', 'desc')
            ->get();
       // if(Request::ajax()) return Response::json(['id'=>$id]);
        //dd($joblists);
        return $joblists;
    }
}
