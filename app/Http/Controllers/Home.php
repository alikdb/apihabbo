<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BadgesNameModel;
use App\Models\Furnis;

class Home extends Controller
{

    public function index() {
        $badges = BadgesNameModel::orderBy('times', 'desc')->limit(32)->get();
        return view('index', ['badges' => $badges]);
    }
    public function listBadges($search = null) {
        $badges = BadgesNameModel::orderBy('times', 'desc')->paginate(150);
        return view('badges', compact('badges'), ['search' => $search]);
    }
    public function listFurnis() {
        $furnis = Furnis::orderBy('created_at', 'desc')->paginate(150);
        return view('furnis', compact('furnis'));
    }

}
