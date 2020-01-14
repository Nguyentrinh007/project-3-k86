<?php
function GetCategory($mang,$parent,$shift)
{
 foreach($mang as $row)
 {
	if($row->parent==$parent)
	{
		echo "<option value='$row->id'>".$shift.$row->name."</option>";
		GetCategory($mang,$row->id,$shift.'---|');
		
	}
 }
}