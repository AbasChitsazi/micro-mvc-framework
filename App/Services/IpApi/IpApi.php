<?php

namespace App\Services\IpApi;
use App\Services\Log\HandleLog;

class IpApi
{
    private $log;
    private $IPAPIEngine = STATUS_IPAPI_ENGIN;
    public function __construct()
    {
        $this->log = new HandleLog();
    }


    public function sendRequest($request)
    {
        if(!$this->IPAPIEngine){
            return;
        }

        $userip = $request->ip();
        $getipdetailes = file_get_contents("http://ip-api.com/json/$userip", false, stream_context_create([
            'http' => ['timeout' => 2]
        ]));
        $ipdetailedArray = (json_decode($getipdetailes, true));
        if ($ipdetailedArray['status'] == 'success') {
            if ($ipdetailedArray['country'] !== Country && $ipdetailedArray['countryCode'] !== CountryCode) {
                view("Blocks.AccessDenied.index");
                exit;
            }
        } else {
            $this->log->WriteFailLogIpApi($ipdetailedArray,__FILE__,__LINE__);
            return;
        }
    }
}