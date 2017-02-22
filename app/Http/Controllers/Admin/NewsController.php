<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NewsAddRequest;
use App\Http\Requests\EditNewsRequest;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use DateTime,Auth;

class NewsController extends Controller
{
    public function getAdd(){
    	$cate = Category::get()->toArray();
    	return view('admin.modules.news.add',['cate' => $cate]);
    }

    public function postAdd(NewsAddRequest $request){
    	$news = new News;
    	$file = $request->file('newsImg');
    	if(strlen($file) > 0){
    		$fileName = time().".".$file->getClientOriginalName();
    		$destination = 'public/uploads/news/';
    		$file->move($destination,$fileName);
    		$news->image = $fileName;
    	}
    	$news->title       = $request->txtTitle;
    	$news->slug        = str_slug($request->txtTitle,"-");
    	$news->author      = $request->txtAuthor;
    	$news->intro       = $request->txtIntro;
    	$news->full        = $request->txtFull;
    	$news->status      = $request->rdoPublic;
    	$news->category_id = $request->sltCate;
    	$news->users_id     = Auth::user()->id;
    	$news->created_at  = new DateTime();
    	$news->save();
    	return redirect()->route('ListNews')->with(['error_msg' => 'result_msg', 'result_msg' => 'Added News Successfully']);
    }

    public function getList(){
    	$news = News::get()->toArray();
    	return view('admin.modules.news.list',['news'=>$news]);
    }

   	public function getDel($id){
   		$news = News::findOrFail($id);
   		if(file_exists(public_path().'/uploads/news/'.$news->image)){
   			unlink(public_path().'/uploads/news/'.$news->image);
   		}
   		$news->delete();
   		return redirect()->route('ListNews')->with(['error_msg' => 'result_msg', 'result_msg' => 'Deleted News Successfully']);
   	}

   	public function getEdit($id){
   		$cate = Category::get()->toArray();
   		$news = News::find($id);
   		return view('admin.modules.news.edit',['news' => $news,'cate'=>$cate]);
   	}

   	public function postEdit(EditNewsRequest $request,$id){
   		$news = News::find($id);
    	$file = $request->file('newsImg');
    	if(strlen($file) > 0){
    		$imgCurrent = $request->imgcurrent;
    		if(file_exists(public_path().'/uploads/news/'.$imgCurrent)){
    			unlink(public_path().'/uploads/news/'.$imgCurrent);
    		}
    		$fileName = time().".".$file->getClientOriginalName();
    		$destination = 'public/uploads/news/';
    		$file->move($destination,$fileName);
    		$news->image = $fileName;
    	}
    	$news->title       = $request->txtTitle;
    	$news->slug        = str_slug($request->txtTitle,"-");
    	$news->author      = $request->txtAuthor;
    	$news->intro       = $request->txtIntro;
    	$news->full        = $request->txtFull;
    	$news->status      = $request->rdoPublic;
    	$news->category_id = $request->sltCate;
    	$news->users_id     = Auth::user()->id;
    	$news->updated_at  = new DateTime();
    	$news->save();
    	return redirect()->route('ListNews')->with(['error_msg' => 'result_msg', 'result_msg' => 'Edited News Successfully']);
   	}
}
