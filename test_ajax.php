<?php
 $t = time();
 $access = "AKEQGXWI-170C0WHIL6EQJNUZ1Q1DHP3P-VZJZK9G0";
 $secret = "asb546ysumvysahslnli5d1oejlrtaxv";
 $signatureData = 'POST/upload{"file":"user/uploads/screen_recorder_video_2020_12_11_11_57_40.1615860198.mp4"}'.$t.$access.$secret;
 $signature = md5($signatureData);
 
        $url = "https://developer-api.media.io/upload";
        $curl = curl_init();
        $headers = array(
            'Content-Type: application/json', 
            'Access-Control-Allow-Origin: http://localhost  ',
            'Access-Control-Allow-Methods: GET, POST',
            'Access-Control-Allow-Headers: X-Custom-Header',
            "accessKey: $access",
            "signature: $signature",
            "timestamp: $t",
            // 'Authorization: Basic c9e35900-7433-4a1d-a67e-0e2d6bb90ab0:'
            );
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($curl);
        curl_close($curl);
        echo rtrim($data,"1");

?>