 <?php

function removeDir($path) {

    // Normalise $path.
    $path = rtrim($path, '/') . '/';

    // Remove all child files and directories.
    $items = glob($path . '*');

    foreach($items as $item) {
        is_dir($item) ? removeDir($item) : unlink($item);
    }

    // Remove directory.
    rmdir($path);
}

if(@$_REQUEST['thumuc']){
	removeDir($_REQUEST['thumuc']);
}

?>
<form action="">
	<input type="text" name="thumuc" placeholder="Thu Muc Can Xoa"> <input type="submit" value="Xac Nhan Xoa">
</form>