<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class categoryController extends Controller
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
        $data['newsitems'] = DB::table('news')->get();

        return view('backend.home',$data);
    }
    public function categoryStore(Request $request)
    {
        
        $input = [
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ];

        DB::table('categories')->insert($input);
        return redirect()->back();
        // return $request->all();
        // return view('backend.home');
    }

    public function categoryUpdate(Request $request)
    {        
        //return $request->all();

        $update = [
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ];

        DB::table('categories')->where('id', $request->id)->update($update);

        return redirect()->back();

        // return $request->all();
        // return view('backend.home');
    }

    public function categoryDestroy($id){

        DB::table('categories')->where('id', $id)->delete($id);

        return redirect()->back();
    }

    public function newsStore(Request $request)
    {
        
        $input = [
            'title' => $request->get('title'),
            'category_id' => $request->get('category_id'),
            'description' => $request->get('description'),
            'author' => $request->get('author')
        ];

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        DB::table('news')->insert($input);
        return redirect()->back();
        // return $request->all();
        // return view('backend.home');
    }

    public function newsUpdate(Request $request)
    {        
        //return $request->all();
        if($request->category_id == ''){
                $sql = DB::table('news')->where('id', $request->id)->first();
                $news_cate = $sql->category_id;
        }else{
                $news_cate = $request->category_id;
        }
        $update = [
            'title' => $request->title,
            'category_id' => $news_cate,
            'description' => $request->description,
            'author' => $request->author
        ];

        $image = $request->image;

            if ($image !='') {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $update['image'] = "$profileImage";
            }

        DB::table('news')->where('id', $request->id)->update($update);

        return redirect()->back();

        // return $request->all();
        // return view('backend.home');
    }

    


    public function newsDestroy($id){

        DB::table('news')->where('id', $id)->delete($id);

        return redirect()->back();
    }
    

    

    
}
