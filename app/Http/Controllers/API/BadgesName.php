<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\BadgesNameModel;

class BadgesName extends Controller
{
    public $hotels = array('es', 'fr', 'com.br', 'it', 'com.tr', 'de', 'nl', 'fi', 'com');
    public function scanBadgeName() {
        foreach($this->hotels as $hotel) {
            $this->getBadges($hotel);
        }
    }
    private function getBadges($hotel) {
        $url = "https://habbo." . $hotel . "/gamedata/external_flash_texts/0";
        $data = Http::get($url);
        $Statushtml2 = '/badge_name_(.*?)=(.*?)\n/';
        preg_match_all($Statushtml2, $data, $Statusraw2);
        echo '<pre>';
        $badgeName = array();
        foreach ($Statusraw2[1] as $key => $value) {
            $badgeName[trim($value)] = str_replace("\"", "´´", str_replace("'", "`", $Statusraw2[2][$key]));
        }
        $count = 0;
        foreach ($badgeName as $code => $name) {
                
            $bCount = BadgesNameModel::where(['code' => $code, 'hotel' => $hotel])->count();

            if ($bCount == 0) {
                $count++;
                BadgesNameModel::create([
                   'code' => $code,
                   'name' => $badgeName[$code],
                   'hotel' => $hotel,
                   'times' => time(),
                ]);
                echo '<span style="color:red">' . $code . ' - ' . $badgeName[$code] . '</span><br>';
            }else {
                $badge = BadgesNameModel::where(['code' => $code, 'hotel' => $hotel])->first();
                if ($badge->name != $badgeName[$code]) {
                    $badgeUpdate = BadgesNameModel::where(['code' => $badge->code, 'hotel' => $badge->hotel])->update(['name' => $name]);
                }
            }

        }
        echo $hotel . ' oteline '. $count .' rozet eklendi';
    }
}
