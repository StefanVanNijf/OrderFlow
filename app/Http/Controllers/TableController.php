<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index($id)
    {
        $table = Table::findOrFail($id);
        return view('table_order', compact('table'));
    }
}