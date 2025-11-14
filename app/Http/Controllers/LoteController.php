<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    public function index()
    {
        $lotes = Lote::with('producto', 'proveedor')->get();
        // return response()->json($lotes);
        return view('admin.lotes.index', compact('lotes'));
    }
}
