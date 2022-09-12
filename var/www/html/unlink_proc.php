<?php
if ( $_GET['type'] == 'main' && (!empty($_GET['inum'] && $_GET['inum'] != '?' && (int)$_GET['inum'] > 1)))
{
        exec('find /var2/dn/ -inum ' . $_GET['inum'] . ' -exec rm -rf {} \;');
	echo '<script>alert(\'Success!\');</script>';
        header("Refresh:0; url=unlink.php");
}
else if ( $_GET['type'] == 'custom' && (!empty($_GET['inum'] && $_GET['inum'] != '?' && (int)$_GET['inum'] > 1)))
{
	exec('find /var2/dn2/ -inum ' . $_GET['inum'] . ' -exec rm -rf {} \;');
	echo '<script>alert(\'Success!\');</script>';
	header("Refresh:0; url=unlink.php");
}
else if ( $_GET['type'] == 'document' && (!empty($_GET['inum'] && $_GET['inum'] != '?' && (int)$_GET['inum'] > 1)))
{
        exec('find /var2/dn3/ -inum ' . $_GET['inum'] . ' -exec rm -rf {} \;');
        echo '<script>alert(\'Success!\');</script>';
        header("Refresh:0; url=unlink.php");
}
else
{
	//echo (int)$_GET['inum'] < 1 ? "true":"false";
	echo '<script>alert(\'Sorry, URL String is not permitted.\');</script>';
        header("Refresh:0; url=unlink.php");
}

?>
