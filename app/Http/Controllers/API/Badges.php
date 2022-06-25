<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BadgesModel;
use Illuminate\Support\Facades\Http;

class Badges extends Controller
{
    public function scanner()
    {

        $badges_array = array();
        $added_badge = array();
        for ($i = 1; $i <= 5; $i++) {
            $response = Http::get("https://habbolifeforum.altervista.org/external/iframes/badges.php?page={$i}");
            preg_match_all('/album1584\/(.+?).png/', $response, $Statusraw);
            $badge = implode("-", $Statusraw[0]);
            $badgeOne = explode(".png-album1584/", $badge);
            $badgeTwo = str_replace("album1584/", "", $badgeOne);
            $result = str_replace(".png", "", $badgeTwo);
            foreach ($result as $badgeItem) {
                array_push($badges_array, $badgeItem);
            }
        }
        echo '<pre>';
        foreach ($badges_array as $code) {
            $b_count = BadgesModel::where('code', $code)->count();
            if ($b_count == 0) {
                $badge = BadgesModel::create([
                    'code' => $code
                ]);
                array_push($added_badge, $code);
                echo '<br><span style="color: red;">' . $code . '</span> added';
            }
        }
        echo "<br>success <b>" . count($added_badge) . "</b> total new badge";
    }
}
