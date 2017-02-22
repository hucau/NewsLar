<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests\CateRequest;

use App\Http\Requests\EditCateRequest;

use App\Models\Category;

use DateTime;
class CateController extends Controller
{
    public function getAdd(){
    	$data = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.modules.category.add',['dataCate' => $data]);
    }

    public function postAdd(CateRequest $request){
    	$cate = new Category;
    	$cate->name = $request->txtCateName;
    	$cate->slug = str_slug($request->txtCateName,'-');
    	$cate->parent_id = $request->sltCate;
    	$cate->created_at = new DateTime();
    	$cate->save();
    	return redirect()->route('listCate')->with(['error_msg' => 'result_msg', 'result_msg' => 'Added Successfully']);
    }

    public function listCate(){
    	$data = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.modules.category.list',['dataCate' => $data]);
    }

    public function delCate($id){
    	$cate = Category::where('parent_id',$id)->count();
    	if($cate == 0){
    		Category::find($id)->delete();
    		return redirect()->route('listCate')->with(['error_msg' => 'result_msg', 'result_msg' => 'Bạn đã xóa thành công mục này']);
    	}else{
    		echo '
				<script>
					alert("Bạn không được xóa mục này");
					window.location = "';
			echo	route('listCate');
			echo '"
				</script>
    		';
    	}
    }

    public function getEdit($id){
    	$cate = Category::find($id)->toArray();
    	$data = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.modules.category.edit',['cate'=>$cate,'data'=>$data]);
    }

    public function postEdit($id,EditCateRequest $request){
    	$cate = Category::find($id);
    	$cate->name = $request->txtCateName;
    	$cate->slug = str_slug($request->txtCateName,'-');
    	$cate->parent_id = $request->sltCate;
    	$cate->updated_at = new DateTime();
    	$cate->save();
    	return redirect()->route('listCate')->with(['error_msg' => 'result_msg', 'result_msg' => 'Updated Successfully']);
    }
}
