<?php

function filesize_cmd($folder, $file) {
return exec('forfiles /p '.$folder.' /m "'.$file.'" /c "cmd /c echo @fsize"'); 
}

?>
