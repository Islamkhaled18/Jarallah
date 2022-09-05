<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;
use Redirect;
class HomeController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
public function index()
{

  $client = new \GuzzleHttp\Client([
    'base_uri' => 'https://api.name.com/v4/',
    'headers' => ['Content-Type' => 'application/json'],
    'auth' => ['ahmedfared', '0ec6c346cc005a18c4fdeefb9bf4c6727e6ea3b2']
]);


$response = $client->request('post', '/v4/domains:checkAvailability', [
    'raw_text' => [
        'domainNames' => ['abc.com']
    ]
]);


$statusCode = $response->getStatusCode();
$content = $response->getBody();

// or when your server returns json
$content = json_decode($response->getBody(), true);


}

       public function switchLang($lang)
    {
        if (array_key_exists($lang, \Config::get('languages'))) {
            Session::put('applocale', $lang);

        }
        return Redirect::back();
    }


    public function change_lang($lang)
    {
        if($lang == 'en'){

            session()->put('lang','en');
        }else if($lang == 'ar')
        {
            session()->put('lang','ar');
        }


        return back();
    }




}
