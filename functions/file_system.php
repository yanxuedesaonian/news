<?php 
function upload($file,$file_path){ 
     $error = $file['error']; 
     switch ($error){ 
     		case 0: 
     			$file_name = $file['name']; 
     			$file_temp = $file['tmp_name']; 
     			$destination = $file_path."/".$file_name; 
     			move_uploaded_file($file_temp,$destination); 
     			return "�ļ��ϴ��ɹ���"; 
     		case 1: 
     			return "�ϴ�����������php.ini��upload_max_filesizeѡ�����Ƶ�ֵ��"; 
     		case 2: 
     			return "�ϴ������Ĵ�С������form��MAX_FILE_SIZEѡ��ָ����ֵ��"; 
     		case 3: 
     			return "����ֻ�в��ֱ��ϴ���"; 
     		case 4: 
     			return "û��ѡ���ϴ�������"; 
     } 
} 
function download($file_dir,$file_name){ 
     if (!file_exists($file_dir.$file_name)) { //����ļ��Ƿ����  
     		exit("�ļ������ڻ���ɾ��");  
     } else { 
     		$file = fopen($file_dir.$file_name,"r"); // ���ļ�  
     		//ǿ���������ʾ����Ի��򣬲��ṩһ���Ƽ����ļ��� 
     		header("Content-Disposition: attachment; filename=".$file_name);  
     		// ����ļ�����  
     		echo fread($file,filesize($file_dir.$file_name));  
     		fclose($file);  
     		exit; 
     }  
} 
?> 