<?
include( __DIR__ . '/db.php');
 $db= new Db();

if($_POST["v11"] == "ok") {
$id=$_POST['id'];
$sql="SELECT lastname, count FROM users WHERE id='$id'";
$familia=$db->queryoun($sql);
$sum=$familia[0]['count'];
$lastn=$familia[0]['lastname'];
$las=rtrim($lastn, "а");
$lan=$lastn.'а';	
	$sql="SELECT * FROM users WHERE (lastname='$lastn' or lastname='$las' or lastname='$lan') and id!=$id";
$ar=$db->query($sql);
$string='';

foreach ($ar as $vl){
	$creeteriy1= explode("@", $vl->email);	
$creeteriy2= explode(".", $creeteriy1[1]);	
$arr= array("ru", "com");	

if ((trim($creeteriy1[0]," ")!='') && (in_array("$creeteriy2[1]", $arr)))
{
$pr='верно';	
	
	
} else { 
$pr='неверно'; 
}
	switch ($vl->parent_id) {
	case 2:
	   $par='#FF4500';
	    break;
	case 3:
	   $par='#00FA9A';
	    break;
	case 4:
	   $par='GreenYellow';
	    break;
	case 5:
	   $par='#9932CC';
	    break;
}
$sum=$sum+$vl->count;
$string .='<tr class="t'.$id.'">
<td style="background:'.$par.'">'.$vl->id.'</td>
<td style="background:'.$par.'">'.$vl->lastname.' '.$vl->firstname.'</td>
<td style="background:'.$par.'">'.$vl->email.' ('.$pr.')'.'</td>
<td style="background:'.$par.'">'.$vl->count.'</td>
</tr>';
}
$string .='<tr class="t'.$id.'">
<td style="background:#FF0000"></td>
<td style="background:#FF0000"></td>
<td style="background:#FF0000">ИТОГ</td>
<td style="background:#FF0000">'.$sum.'</td></tr>';
echo $string;
}
	
	
	?>