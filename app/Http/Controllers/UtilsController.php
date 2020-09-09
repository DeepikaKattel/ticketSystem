<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function setLimit(Request $request, $id = 5)
    {
        if(is_numeric($id)){
            $request->session()->put('globalPageLimit', abs(intval($id)));
        }
        else{
            $request->session()->put('globalPageLimit', 'all');
        }


        return back();
    }
}
