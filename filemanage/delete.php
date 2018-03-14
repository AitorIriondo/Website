

<?php
$filename = $_GET["deletedFile"];
$path = "../uploads";
$filepath = $path . DIRECTORY_SEPARATOR . $filename;
$result = unlink($filepath);
if ($result == 1){
	echo "Done";
}
else {
	echo "There has been an error, contact the administrator";
}

?>
<script type="text/javascript">
    window.setTimeout(function() {
        window.location.href='../user_lab_interface.php';
    }, 2000);
</script>