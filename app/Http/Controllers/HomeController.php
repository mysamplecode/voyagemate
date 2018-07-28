<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\Common;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Auth;
use App;
use Session;
use Route;
use App\Models\Currency;
use App\Models\Page;
use App\Models\Settings;
use App\Models\StartingCities;
use App\Models\Banners;

class HomeController extends Controller
{
    private $helper;
    
    public function __construct()
    {
        $this->helper = new Common;
    }
     
    public function index()
    {
        $data['starting_cities']     = StartingCities::all();
        $data['city_count']          = StartingCities::all()->count();
        $data['banners']             = Banners::where('status', 'Active')->get();
       
        return view('home.home', $data);
    }
    
    public function phpinfo()
    {
        echo phpinfo();
    }

    public function login()
    {   
        return view('home.login');
    }
   
    public function set_session(Request $request)
    {
        if($request->currency) {
            Session::put('currency', $request->currency);
            $symbol = Currency::code_to_symbol($request->currency);
            Session::put('symbol', $symbol);
        }
        else if($request->language) {
            Session::put('language', $request->language);
            App::setLocale($request->language);
        }
    }

    public function cancellation_policies()
    {
        return view('home.cancellation_policies');
    }
 
    public function static_pages(Request $request)
    {
        $pages = Page::where(['url'=>$request->name, 'status'=>'Active']);

        if(!$pages->count())
            abort('404');

        $pages = $pages->first();

        $data['content'] = str_replace(['SITE_NAME', 'SITE_URL'], [SITE_NAME, url('/')], $pages->content);
        $data['title'] = $pages->title;

        return view('home.static_pages', $data);
    }

}
