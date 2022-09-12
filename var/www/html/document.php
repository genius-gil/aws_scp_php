<!DOCTYPE html>
<html>
<body>
<img src="http://nstek.com/images/logo.png" alt=""><br><p>
<?php
$external_ip = gethostbyname($_SERVER["HTTP_HOST"]);
//echo $external_ip;
?>
<form action="upload3.php" method="post" enctype="multipart/form-data">
  Select File to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="submit">
</form>
<br>
- Uploaded File list -  <a href="http://<?php echo $external_ip; ?>/">go to main page</a>
<br><p><br>
</body>
</html>

<?php
if(exec("ls -tr /var2/dn3/",$output)){
	for($i = 0; $i < count($output); $i++){
		$j = (int)$i + 1;
		$fname = rawurlencode($output[$i]);
		//echo $fname;
		//echo $j.". ".$output[$i]." <a href=\"/dn/$output[$i]\">Download</a><br>\n";
		$fsize_kb = "(" . round(filesize("/var2/dn3/" . $output[$i])/1024/1024, 2) . " MB)";
		echo "<a href=/dn.php?type=document&fname=$fname> $j. $output[$i] $fsize_kb</a><br><p>\n";
	}
}
else{
	echo "File List not exist or exec() func fail <br>\n";
}
?>
