@extends('admin.master')
@section('title','Sửa bài viết')
@section('content')
    <div id="main">
		<form action="" method="POST" enctype="multipart/form-data" style="width: 650px;">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<fieldset>
				<legend>Thông Tin Bản Tin</legend>
				<span class="form_label">Tên danh mục:</span>
				<span class="form_item">
					<select name="sltCate" class="select">
						<option value="">Chọn danh mục</option>
						{{ MenuMulti($cate,0,"--",$news['category_id']) }}
					</select>
				</span><br />
				<span class="form_label">Tiêu đề tin:</span>
				<span class="form_item">
					<input type="text" name="txtTitle" class="textbox" value="{{ $news['title'] }}" />
				</span><br />
				<span class="form_label">Tác gỉả:</span>
				<span class="form_item">
					<input type="text" name="txtAuthor" class="textbox" value="{{ $news['author'] }}"/>
				</span><br />
				<span class="form_label">Trích dẫn:</span>
				<span class="form_item">
					<textarea name="txtIntro" rows="5" class="textbox">{{ $news['intro'] }}</textarea>
					<script type="text/javascript">
						var editor = CKEDITOR.replace('txtIntro');
					</script>
				</span><br />
				<span class="form_label">Nội dung tin:</span>
				<span class="form_item">
					<textarea name="txtFull" rows="8" class="textbox">{{ $news['full'] }}</textarea>
					<script type="text/javascript">
						var editor = CKEDITOR.replace('txtFull');
					</script>
				</span><br />
				<span class="form_label">Hình hiện tại:</span>
				<span class="form_item">
					<input type="hidden" name="imgcurrent" value="{{ $news['image'] }}" />
					<img src='{{ (isset($news["image"])) ? asset("public/uploads/news/".$news['image']) : asset("public/mt95_admin/templates/images/nophoto.png") }}' width="100px" />
				</span><br />
				<span class="form_label">Hình đại diện:</span>
				<span class="form_item">
					<input type="file" name="newsImg" class="textbox" />
				</span><br />
				<span class="form_label">Công bố tin:</span>
				<span class="form_item">
					<input type="radio" name="rdoPublic" value="1"
					@if($news['status'] == 1)
						checked
					@endif
					/> Có 
					<input type="radio" name="rdoPublic" value="0" 
					@if($news['status'] == 0)
						checked
					@endif
					/> Không
				</span><br />
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnNewsEdit" value="Sửa tin" class="button" />
				</span>
			</fieldset>
		</form>
	</div>
@endsection