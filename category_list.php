<?php 
include_once("functions/database.php"); 
include_once("functions/page.php"); 
include_once("functions/is_login.php"); 
if (!session_id()){//����ʹ��session_id()�ж��Ƿ��Ѿ�������Session 
	session_start(); 
} 
//��ʾ�ļ��ϴ���״̬��Ϣ 
if(isset($_GET["message"])){ 
     echo $_GET["message"]."<br/>"; 
} 
//�����ѯ�������ŵ�SQL��� 
$search_sql = "select * from category order by category_id desc"; 
//������ģ����ѯ��ȡ��ģ����ѯ�Ĺؼ���keyword 
$keyword = ""; 
if(isset($_GET["keyword"])){ 
     $keyword = trim($_GET["keyword"]); 
     //����ģ����ѯ���ŵ�SQL��� 
     $search_sql = "select * from category where name like '%$keyword%'order by category_id desc"; 
} 
//�ṩ����ģ����ѯ��form���� 
?> 
<form action="index.php?url=category_list.php" method="get">
������ؼ��֣�<input type="text" name="keyword" value="<?php echo $keyword?>"> 
<input type="submit" value="����"> 
</form> 
<br/> 
<table> 
<?php 
get_connection(); 
//��ҳ��ʵ�� 
$result_category = mysql_query($search_sql); 
$total_records = mysql_num_rows($result_category); 
$page_size = 3; 
if(isset($_GET["page_current"])){ 
     $page_current = $_GET["page_current"]; 
}else{ 
     $page_current=1; 
} 
$start = ($page_current-1)*$page_size; 
$search_sql = "select * from category order by category_id desc limit $start,$page_size"; 
if(isset($_GET["keyword"])){ 
     $keyword = trim($_GET["keyword"]);  
     //����ģ����ѯ���ŵ�SQL��� 
     $search_sql = "select * from category where name like '%$keyword%' order by category_id desc limit $start,$page_size"; 
} 
$result_set = mysql_query($search_sql); 
close_connection(); 
if(mysql_num_rows($result_set)==0){ 
     exit("���޼�¼��"); 
} 
while($row = mysql_fetch_array($result_set)){ 
?> 
<tr> 
<td> 
     <a href="index.php?url=category_detail.php&keyword=<?php echo $keyword?>&category_id= <?php echo $row['category_id']?>"><?php echo mb_strcut($row['name'],0,40,"gbk")?></a>
</td>
<?php 
if(is_login()){ 
?> 
<td> 
     <a href="index.php?url=category_edit.php&category_id=<?php echo $row['category_id']?>">�༭</a> 
</td> 
<td> 
     <a href="index.php?url=category_delete.php&category_id=<?php echo $row['category_id']?>" onclick="return confirm('ȷ��ɾ����');">ɾ��</a> 
</td> 
<?php 
} 
?> 
</tr> 
<?php 
} 
?> 
</table> 
<?php 
//��ӡ��ҳ������
$url = $_SERVER["PHP_SELF"]; 
page($total_records,$page_size,$page_current,$url,$keyword); 
?> 