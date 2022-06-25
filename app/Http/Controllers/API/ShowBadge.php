<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BadgesNameModel;

class ShowBadge extends Controller
{
    public function index() {
        $hotels = array('es', 'fr', 'com.br', 'it', 'com.tr', 'de', 'nl', 'fi', 'com');
        $pp = $_GET['per_page'] ?? 50;
        $hotel = isset($hotel) && in_array($_GET['hotel'], $hotels) ? $_GET['hotel'] : null;
        $where = htmlspecialchars($_GET['name'] ?? null) ?? null;
        $code = htmlspecialchars($_GET['code'] ?? null) ?? null;
        if (is_numeric($pp) && $pp < 100) {
            $pp = $pp;
        }
        $badges = BadgesNameModel::when($hotel, function ($query, $hotel) {
            $query->where('hotel', $hotel);
        })->when($where, function ($query, $where) {
            $query->where('name', 'like', '%'.$where.'%');
        })->when($code, function ($query, $code) {
            $query->where('code', $code);
        })->orderBy('times', 'desc')->paginate($pp);
        return response()->json($badges);
    }
}
