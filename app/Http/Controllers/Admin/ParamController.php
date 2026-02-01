<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ParamController extends Controller
{
    public function tauxPret(){
        $tauxPret = DB::table('tbltarifpret')
            ->where('partenaire', 'COFINA')
            ->firstOrFail();
    
        return response()->json($tauxPret);
    }
}
