<!DOCTYPE html>
<html>
<body>
<img src="http://nstek.com/images/logo.png" alt=""><br><p>
<?php
$external_ip = gethostbyname($_SERVER["HTTP_HOST"]);
//echo $external_ip;
?>
<br>
- Hidden Delete File list -
<a href="http://<?php echo $external_ip; ?>/">(main)</a>&nbsp;
<a href="http://<?php echo $external_ip; ?>/custom.php">(custom)</a>
<br><p><br>
</body>
</html>

<?php
$tot_num = 0;
if(exec("ls -itr /var2/dn/",$output)){
	for($i = 0; $i < count($output); $i++){
		$j = (int)$i + 1;
		$exp_inum = explode(' ', $output[$i], 2)[0];
		$exp_name = explode(' ', $output[$i], 2)[1];
		$fname = rawurlencode($exp_name);
		global $tot_num;
		$tot_num += 1; 
		$fsize_kb = "(" . round(filesize("/var2/dn/" . $exp_name)/1024/1024, 2) . " MB)";
		//echo $j.". ".$output[$i]." <a href=\"/dn/$output[$i]\">Download</a><br>\n";
		echo "<a href=/unlink_proc.php?type=main&inum=$exp_inum&fname=$fname> $tot_num. $exp_name $fsize_kb</a><br><p>\n";
	}
}
else{
	echo "Main File List not exist or exec() func fail <br>\n";	
}

if(exec("ls -itr /var2/dn2/",$output2)){
	for($i = 0; $i < count($output2); $i++){
		$j = (int)$i + 1;
		$exp_inum2 = explode(' ', $output2[$i], 2)[0];
                $exp_name2 = explode(' ', $output2[$i], 2)[1];
		$fname2 = rawurlencode($exp_name2);
        	global $tot_num; 
        	$tot_num += 1;
		$fsize_kb2 = "(" . round(filesize("/var2/dn2/" . $exp_name2)/1024/1024, 2) . " MB)";
        	//echo $j.". ".$output[$i]." <a href=\"/dn/$output[$i]\">Download</a><br>\n";
        	echo "<a href=/unlink_proc.php?type=custom&inum=$exp_inum2&fname=$fname2> $tot_num. $exp_name2 $fsize_kb2</a><br><p>\n";
	}
}
else{
        echo "Custom File List not exist or exec() func fail <br>\n";
}

if(exec("ls -itr /var2/dn3/",$output3)){
        for($i = 0; $i < count($output3); $i++){
                $j = (int)$i + 1;
                $exp_inum3 = explode(' ', $output3[$i], 2)[0];
                $exp_name3 = explode(' ', $output3[$i], 2)[1];
                $fname3 = rawurlencode($exp_name3);
                global $tot_num;
                $tot_num += 1;
                $fsize_kb3 = "(" . round(filesize("/var2/dn3/" . $exp_name3)/1024/1024, 2) . " MB)";
                //echo $j.". ".$output[$i]." <a href=\"/dn/$output[$i]\">Download</a><br>\n";
                echo "<a href=/unlink_proc.php?type=document&inum=$exp_inum3&fname=$fname3> $tot_num. $exp_name3 $fsize_kb3</a><br><p>\n";
        }
}
else{
        echo "Document File List not exist or exec() func fail <br>\n";
}
?>
