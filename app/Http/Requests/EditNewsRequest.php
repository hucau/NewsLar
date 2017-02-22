<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
    {
        return [
            'sltCate'    => 'required',
            'txtTitle'   => 'required|unique:mt95_news,title,'.$this->id,
            'txtAuthor'  => 'required',
            'txtIntro'   => 'required',
            'txtFull'    => 'required',
            'rdoPublic'  => 'required',
            'newsImg'    => 'image|mimes:png,jpg,jpeg,bmp'
        ];
    }
    public function messages(){
        return [
            'sltCate.required'   => 'Vui lòng chọn danh mục',
            'txtTitle.required'  => 'Vui lòng chọn tiêu đề',
            'txtTitle.unique'    =>  'Tiêu đề này đã tồn tại',
            'txtAuthor.required' =>  'Vui lòng nhập tác giả',
            'txtIntro.required'  => 'Vui lòng nhập tóm tắt tin',
            'txtFull.required'   => 'Vui lòng nhập nội dung tin',
            'rdoPublic.required' => 'Vui lòng chọn công bố tin',
            'newsImg.image'      => 'Đây phải là định dạng hình',
            'newsImg.mimes'      => 'Hình của bạn phải là 1 trong các định dạng sau : png,jpg,jpeg,bmp'
        ];
    }
}
