<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Furnis;

class FurnisController extends Controller
{
    public static function scanFurnis() {
        echo '<pre>';
        $xmlGet = Http::get('https://habbo.com/gamedata/furnidata_xml/0');
        $xml = simplexml_load_string($xmlGet->body());
        $furnis = [];
        foreach ($xml->roomitemtypes->furnitype as $furni) {
            $name = $furni->name;
            $revision = $furni->revision;
            $description = $furni->description;
            $category = $furni->category;
            $hotel_id = (string) $furni->attributes()->id;
            $code = (string) $furni->attributes()->classname;

            $countDb = Furnis::where('code', $code)->count();
            if ($countDb == 0) {
                Furnis::create([
                    'revision' => $revision,
                    'code' => $code,
                    'name' => $name,
                    'description' => $description,
                    'category' => $category,
                    'hotel_id' => $hotel_id,
                ]);
                echo 'Added: '.$name.'<br>';
            }else {
                $getFurni = Furnis::where('code', $code)->first();
                if ($getFurni->name != $name) {
                    $getFurni->name = $name;
                    $getFurni->save();
                    echo 'Updated: '.$name.'<br>';
                }
            }
        }
    }
    public static function listFurnis() {
        $furnis = Furnis::all();
        return response()->json($furnis);
    }
}