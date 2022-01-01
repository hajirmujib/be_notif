<?php
/******* Use to download the documents ********************/
    $file = $_REQUEST['filename'];
    $fileext =  strtolower(substr(strrchr($file,'.'),1));
    if($fileext == 'zip')
    {
        $contenttype = "application/force-download";
    }
    else if($fileext == 'pdf')
    {
        $contenttype = "application/pdf";
    }
    else
    {
        $contenttype = "text/plain" ;
    }
    $uri    = '../laporan/'.$file;
    header('Content-Description: File Transfer');
    header("Content-Type: " . $contenttype);
    //header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment; filename=\"" . basename($file) . "\";");

    readfile($uri);
    exit();
?>