<?php

function AddLog($log, $logfilepath){

    if(file_exists($logfilepath)){
        $fileData = file_get_contents($logfilepath);
        $date = date("d-m-Y \| h:i:s A");
        $fileData .= "\r\n [$date] $log";
        file_put_contents($logfilepath, $fileData);
    }else{
        $date = date("d-m-Y \| h:i:s A");
        file_put_contents($logfilepath, "[$date] $log");
    }
}
?>
