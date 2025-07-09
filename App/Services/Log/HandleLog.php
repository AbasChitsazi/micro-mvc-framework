<?php

namespace App\Services\Log;


class HandleLog
{
    private $LogEngine = STATUS_LOG_ENGIN;
    private $directory = __DIR__."/logs";
    public function WriteFailLogIpApi($data,$file,$line)
    {
        if(!$this->LogEngine){
            return;
        }
        if(!is_dir($this->directory)){
            mkdir($this->directory,0777,true);
        }
        $log = date('Y-m-d H:i:s') . " - IP: {$data['query']} | Error: {$data['message']} | File: $file | Line: $line\n";
        file_put_contents($this->directory."/FailLogs.txt",$log,FILE_APPEND);

    }
}