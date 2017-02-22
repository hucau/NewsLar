@extends('admin.master')
@section('title','Danh mục')
@section('content')
    <div id="main">
        <table class="list_table">
            <tr class="list_heading">
                <td>Danh Mục</td>
                <td class="action_col">Quản lý?</td>
            </tr>
            {{ ListCateMulti($dataCate,0,'') }}
        </table>
    </div>
@endsection