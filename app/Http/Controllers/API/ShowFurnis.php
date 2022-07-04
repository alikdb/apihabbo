<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Furnis;

class ShowFurnis extends Controller
{
    public function index() {
        $pp = $_GET['per_page'] ?? 50;
        $where = htmlspecialchars($_GET['name'] ?? null) ?? null;
        $code = htmlspecialchars($_GET['code'] ?? null) ?? null;
        if (is_numeric($pp) && $pp < 100) {
            $pp = $pp;
        }
        $badges = Furnis::when($where, function ($query, $where) {
            $query->where('name', 'like', '%'.$where.'%');
        })->when($code, function ($query, $code) {
            $query->where('code', $code);
        })->orderBy('created_at', 'desc')->paginate($pp);
        return response()->json($badges);
    }
}
