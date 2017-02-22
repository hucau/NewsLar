@extends('admin.master')
@section('title','List User') 
@section('content')
    <div id="main">
        <table class="list_table">
            <tr class="list_heading">
                <td class="id_col">STT</td>
                <td>Username</td>
                <td>Level</td>
                <td class="action_col">Quản lý?</td>
            </tr>
            <?php $i = 0 ?>
            @foreach($user as $item)
            <?php $i++ ?>
            <tr class="list_data">
                <td class="aligncenter">{{ $i }}</td>
                <td class="list_td aligncenter">{!! $item['username'] !!}</td>
                @if($item['id'] == 1)
                    <td align="center"><span style="color: red; font-weight: bold;">Super Admin</span></td>
                @elseif($item['level'] == 1)
                    <td align="center"><span style="color: blue; font-weight: bold;">Admin</span></td>
                @else
                    <td align="center"><span style="color: black;">Member</span></td>
                @endif
                <td class="list_td aligncenter">
                    <a href="{{ route('getEditUser', ['id' => $item['id']]) }}"><img src="{{ asset('public/mt95_admin/templates/images/edit.png') }}" /></a>&nbsp;&nbsp;&nbsp;
                    <a class="del" href="{{ route('delUser', ['id' => $item['id']]) }}"><img src="{{ asset('public/mt95_admin/templates/images/delete.png') }}" /></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection