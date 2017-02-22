<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;

class MainController extends Controller
{
	public function getMaster(){
		$cate = Category::select('id','name','parent_id','slug')->get()->toArray(); 
		return view('client.master',['cate'=>$cate]);
	}
    public function getIndex(){
    	$news = News::with('cate')->orderBy('id','DESC')->limit(5)->get()->toArray();
    	return view('client.pages.main',['news'=>$news]);
    }

    public function getCate($id){
    	// $cate = Category::find($id)->first()->toArray();
    	$news = News::with('cate')->where('category_id',$id)->get()->toArray();
    	return view('client.pages.cate',['news'=>$news]);
    }

    public function getDetail($id){
    	$news = News::find($id);
    	return view('client.pages.detail',['news'=>$news]);
    }
}
