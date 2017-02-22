<?php
function MenuMulti($data, $parent_id = 0, $str = "--",$select = 0){
	foreach($data as $item){
		$id = $item['id'];
		$name = $item['name'];
		if($item['parent_id'] == $parent_id){
			if($select != 0 && $id == $select){
				echo "<option value=".$id." selected>".$str." ".$name."</option>";
			}else{
				echo "<option value=".$id.">".$str." ".$name."</option>";
			}
			MenuMulti($data,$id, $str."--");
		}
	}
}

function ListCateMulti($data, $parent_id = 0, $str=""){
	foreach($data as $item){
		$id   = $item['id'];
		$name = $item['name'];
		if($item['parent_id'] == $parent_id){
			echo '
				<tr class="list_data">';
	        if($item['parent_id'] == 0){
	            echo   '<td class="list_td alignleft">'.$str." <b>".$name.'<b/></td>';
	        }else{
	        	echo   '<td class="list_td alignleft">'.$str." ".$name.'</td>';
	        }
	        echo '
	                <td class="list_td aligncenter">
	                    <a href="edit/'.$id.'"><img src="../../public/mt95_admin/templates/images/edit.png" /></a>&nbsp;&nbsp;&nbsp;
	                    <a class="del" href="javascript:void(0)" ><img src="../../public/mt95_admin/templates/images/delete.png" /></a>
	                </td>
	            </tr>
			';
			ListCateMulti($data,$id, $str."--");
		}
	}
}

function ListCateClient($data,$id){
	echo "<ul>";
	foreach($data as $item){
		if($item['parent_id'] == $id){
			echo "<li><a href='../../the-loai/".$item['id']."/".$item['slug']."'>".$item['name']."</a>";
			ListCateClient($data,$item['id']);
			echo "</li>";
		}
	}
	echo "</ul>";
}
?>