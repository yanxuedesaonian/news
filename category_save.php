<?php 
include_once("functions/is_login.php"); 
if(!session_id()){//����ʹ��session_id()�ж��Ƿ��Ѿ�������Session 
     session_start(); 
} 
if(!is_login()){ 
     echo "������¼ϵͳ���ٷ��ʸ�ҳ�棡"; 
     return; 
} 
?> 
<?php 
include_once("functions/file_system.php"); 
if(empty($_POST)){ 
     $message = "�ϴ����ļ�������php.ini��post_max_sizeѡ�����Ƶ�ֵ"; 
}else{ 
     $category_id = $_POST["category_id"]; 
     $name = $_POST["name"]; 
     $file_name = $_FILES["category_file"]["name"]; 
     $message = upload($_FILES["category_file"],"uploads"); 
     $sql = "insert into category 
values($category_id,'$name','$file_name')";
 	$message = "�������ɹ���"; 
	include_once("functions/database.php"); 
	get_connection(); 
	mysql_query($sql); 
	close_connection(); 
	$message = "�������ɹ���"; 
}
$message = urlencode($message);
 header("Location:index.php?url=category_list.php&message=$message"); 
?> 