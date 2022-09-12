<?php
//
header("Content-Type:application/octet-stream; charset=utf-8");
header("Content-Transfer-Encoding: binary");
header("Cache-Control:cache,must-revalidate");
header("Pragma:no-cache");
header("Expires:0");
//
if ( $_GET['type'] == 'main' )
{
	$file       = './dn/' . $_GET['fname'];
	$filesize   = filesize($file);
	//echo $file . $filesize;
	//exit;
	header("Content-Length: $filesize");
	$dwFileName = $_GET['fname'];
	header("Content-Disposition: attachment; filename=$dwFileName");
	readfile($file);
}
else if ( $_GET['type'] == 'custom' )
{
        $file       = './dn2/' . $_GET['fname'];
        $filesize   = filesize($file);
        header("Content-Length: $filesize");
        $dwFileName = $_GET['fname'];
        header("Content-Disposition: attachment; filename=$dwFileName");
	readfile($file);
}
else if ( $_GET['type'] == 'document' )
{
        $file       = './dn3/' . $_GET['fname'];
        $filesize   = filesize($file);
        header("Content-Length: $filesize");
        $dwFileName = $_GET['fname'];
        header("Content-Disposition: attachment; filename=$dwFileName");
        readfile($file);
}
else
{
	echo '<script>alert(\'Sorry, URL String is not permitted.\');</script>';
	header("Refresh:0; url=index.php");
}
//echo $file;
//echo file_get_contents($file);
