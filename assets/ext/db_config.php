<?php   
   
$file = fopen("../../application/config/database.php", "r") or exit("Unable to open file!");

$db_ci_hostname = '';
$db_ci_username = ''; 
$db_ci_password = '';
$db_ci_database = '';

while(!feof($file))
{
	$item = fgets($file);  
 	 	 
	if(strpos($item,"db['default']['hostname'] =") > 0)
	{
		$pos = strpos($item,"=");
		$db_ci_hostname = substr($item,$pos,strlen($item)-$pos); 
		$db_ci_hostname = str_replace("=","",$db_ci_hostname);
		$db_ci_hostname = str_replace("'","",$db_ci_hostname);
		$db_ci_hostname = str_replace(";","",$db_ci_hostname);		
	} 
 	
	if(strpos($item,"db['default']['username'] =") > 0)
	{
		$pos = strpos($item,"=");
		$db_ci_username = substr($item,$pos,strlen($item)-$pos); 
		$db_ci_username = str_replace("=","",$db_ci_username);
		$db_ci_username = str_replace("'","",$db_ci_username);
		$db_ci_username = str_replace(";","",$db_ci_username);		
	} 
	
	if(strpos($item,"db['default']['password'] =") > 0)
	{
		$pos = strpos($item,"=");
		$db_ci_password = substr($item,$pos,strlen($item)-$pos); 
		$db_ci_password = str_replace("=","",$db_ci_password);
		$db_ci_password = str_replace("'","",$db_ci_password);
		$db_ci_password = str_replace(";","",$db_ci_password);		
	} 
	
	if(strpos($item,"db['default']['database'] =") > 0)
	{
		$pos = strpos($item,"=");
		$db_ci_database = substr($item,$pos,strlen($item)-$pos); 
		$db_ci_database = str_replace("=","",$db_ci_database);
		$db_ci_database = str_replace("'","",$db_ci_database);
		$db_ci_database = str_replace(";","",$db_ci_database);		
	} 
   
}
 
fclose($file);

$db_ci_hostname = trim($db_ci_hostname);
$db_ci_username = trim($db_ci_username); 
$db_ci_password = trim($db_ci_password);
$db_ci_database = trim($db_ci_database);
 
?>