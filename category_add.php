<?php 
include_once("functions/is_login.php"); 
if (!session_id()){//����ʹ��session_id()�ж��Ƿ��Ѿ�������Session 
     session_start(); 
} 
if(!is_login()){ 
     echo "������¼ϵͳ���ٷ��ʸ�ҳ�棡"; 
     return; 
} 
?> 
<form action="category_save.php" method="post" enctype="multipart/form-data"> 
���<input type="text" size="20" name="name"><br/>	 
<?php 
include_once("functions/database.php"); 
get_connection(); 
$result_set = mysql_query("select * from category"); 
close_connection(); 
while($row = mysql_fetch_array($result_set)){ 
?> 
<?php 
} 
?> 
</select><br/> 
<input type="submit" value="�ύ"><input type="reset" value="����"> 
</form> 