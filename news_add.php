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
<form action="news_save.php" method="post" enctype="multipart/form-data"> 
���⣺	<input type="text"  size="60" name="title"><br/> 
���ݣ�	<textarea cols="60" rows="16" name="content"></textarea><br/>
<br/>
���	 
<select name="category_id" size="1"> 
<?php 
include_once("functions/database.php"); 
get_connection(); 
$result_set = mysql_query("select * from category"); 
close_connection(); 
while($row = mysql_fetch_array($result_set)){ 
?> 
     <option value="<?php echo $row['category_id'];?>"><?php echo $row['name'];?></option> 
<?php 
} 
?> 
</select><br/> 
������	<input type="file" name="news_file" size="50"> 
<input type="hidden" name="MAX_FILE_SIZE" value="10485760"> 
<br/> 
<input type="submit" value="�ύ"><input type="reset" value="����"> 
</form> 