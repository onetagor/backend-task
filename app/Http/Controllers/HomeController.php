<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {   
        $data['category'] = DB::table('categories')->get();
        $data['newsitems'] = DB::table('news')
            ->join('categories', 'categories.id', 'news.category_id')
            ->select('news.*', 'categories.title as cate_title')
            ->get();
        //return $data['items'];
        return view('backend.home',$data);
    }

    
}
