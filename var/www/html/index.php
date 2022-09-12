<!DOCTYPE html>
<html>
<body>
<img src="http://nstek.com/images/logo.png" alt=""><br><p>
<?php
$external_ip = gethostbyname($_SERVER["HTTP_HOST"]);
//echo $external_ip;
$end_date = date('2023-08-15');
$d_day = floor((strtotime(substr($end_date,0,10)) - strtotime(date('Y-m-d')) )/86400) - 1;
if($d_day < 0){
	$d_day = '00';
}
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select File to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="submit">
</form>
<br>
<?php echo 'AWS Free Tier Remaining D-Day : '.$d_day.' Days'; ?>
<br><p>
- Uploaded File list - <a href="http://<?php echo $external_ip; ?>/custom.php">go to custom page</a>
<br><p><br>
</body>
</html>

<?php
if(exec("ls -tr /var2/dn/",$output)){
	for($i = 0; $i < count($output); $i++){
		$j = (int)$i + 1;
		$fname = rawurlencode($output[$i]);
		//echo $j.". ".$output[$i]." <a href=\"/dn/$output[$i]\">Download</a><br>\n";
		$fsize_kb = "(" . round(filesize("/var2/dn/" . $output[$i])/1024/1024, 2) . " MB)";
		echo "<a href=/dn.php?type=main&fname=$fname> $j. $output[$i] $fsize_kb</a><br><p>\n";
	}
}
else{
	echo "File List not exist or exec() func fail <br>\n";
}
?>
