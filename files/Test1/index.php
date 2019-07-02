<head>
<link rel="stylesheet" href="/bootstrap-4.3.1-dist/css/bootstrap.min.css">

<script src="/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<script src="/jquery-3.0.0.min.js"></script>
<script src="/jquery-migrate-1.4.1.min.js"></script>

</head>
<?
include( __DIR__ . '/db.php');
 $db= new Db();
$sql="SELECT * FROM users WHERE parent_id is null";
$ar=$db->query($sql);
/*$id=2;
$sql="SELECT lastname FROM users WHERE id='$id'";
$familia=$db->queryoun($sql);
var_dump($familia); 
$lastn=$familia[0]['lastname'];
$las=rtrim($lastn, "а");
$lan=$lastn.'а';	
	$sql="SELECT * FROM users WHERE (lastname='$lastn' or lastname='$las' or lastname='$lan') and id!=$id";
$ar1=$db->query($sql);*/
?>
<table class="table">
<thead class="thead-dark">
<tr>
<th>ИД</th>
<th>ФИ</th>
<th>email</th>
<th>Сумма</th>
</tr>
</thead>
<?
//var_dump($ar1);
foreach ($ar as $value) {
$creeteriy1= explode("@", $value->email);	
$creeteriy2= explode(".", $creeteriy1[1]);	
$arr= array("ru", "com");	

if ((trim($creeteriy1[0]," ")!='') && (in_array("$creeteriy2[1]", $arr)))
{
$pr='верно';	
	
	
} else { 
$pr='неверно'; 
}
?>
<tr name="1" data-id="<?=$value->id;?>">
<td><?=$value->id;?></td>
<td><?=$value->lastname.' '.$value->firstname;?></td>
<td><?=$value->email.' ('.$pr.')';?></td>
<td><?=$value->count;?></td>


</tr>
<?

}
?>
</table>

<script>
$(document).ready(function(){
	$("tr[name=1]").click(function(){
	var id=$(this).attr('data-id');
	this_tr = $(this).closest('tr');
	$('.t'+id).remove();

});
$("tr[name=1]").dblclick(function(){	
var id=$(this).attr('data-id');	
	console.log(id);
	this_tr = $(this).closest('tr');
	
	$('.t'+id).remove();
		
$.ajax({
				url:'/Test1/ajax.php',
				type:"POST",
				data: {'v11': "ok", 'id': id},
				success: function(data){
					console.log(id);
					this_tr.after(data);
				}
			});
	
		});

});

</script>