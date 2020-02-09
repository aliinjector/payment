<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Stat;
use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ErrorLog;
use Jenssegers\Agent\Agent;
use PulkitJalan\GeoIP\GeoIP;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = \Auth::user()->shop()->first();
        $stats = $shop->stats()->get();
        return view('dashboard.shop.stats', compact('shop', 'stats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function addStat(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        $agent = new Agent();
        $geoip = new GeoIP();


        $ip = (isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER['REMOTE_ADDR']);
        $geoip->setIp('46.4.219.148');
//        $geoip->setIp($ip);
        $country = visitor_country($geoip->getRaw()['countryCode']);
        $countryCode = ($geoip->getRaw()['countryCode']);
        $city = visitor_city($geoip->getRaw()['city']);
        $isp = visitor_isp($geoip->getRaw()['isp']);

        $wh = $_POST['wh'];
        $loc = $_POST['loc'];
        $ref = $_POST['ref'];
        $page = $_POST['page'];
        $shop = explode('/', $page);
        $shop = $shop[1];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $today = jdate()->forge('today')->format('Y/m/d');
        $date = jdate('d');
        $month_number = jdate('F');
        $year_number = jdate('Y');
        $day_name = jdate('l');
        $dateTime = "$day_name";
        $timestamp = time();
        $weekDay = jdate()->forge('now')->format('%A');
        $hour = jdate()->forge('now')->getHour();

        $osName = visitor_os($agent->platform());
        $osVersion = $agent->version($agent->platform());
        $device = $agent->device();

        $browserName = visitor_browser($agent->browser());
        $browserVersion = $agent->version($agent->browser());
        $userAagent = $_SERVER['HTTP_USER_AGENT'];

        if ($ref == '') {
            $ref = "مستقیم";
        }

        $searchEngine = 'Nothing';
        if(strpos($ref, 'google.com') > 0) {
            $searchEngine = 'گوگل';
        }

        if(strpos($ref, 'bing.com') > 0) {
            $searchEngine = 'بینگ';
        }

        if(strpos($ref, 'yahoo.com') > 0) {
            $searchEngine = 'یاهو';
        }


        $stat = Shop::where('english_name', $shop)->first()->stats()->create([
            'url' => $loc,
            'osName' => $osName,
            'osVersion' => $osVersion,
            'browserName' => $browserName,
            'browserVersion' => $browserVersion,
            'userAgent' => $userAagent,
            'dateTime' => $dateTime,
            'day' => $today,
            'ip' => $ip,
            'wh' => $wh,
            'timestamp' => $timestamp,
            'ref' => $ref,
            'searchEngine' => $searchEngine,
            'device' => $device,
            'country' => $country,
            'countryCode' => $countryCode,
            'city' => $city,
            'isp' => $isp,
            'weekDay' => $weekDay,
            'hour' => $hour,
            'page' => $page,
        ]);







    }

}
