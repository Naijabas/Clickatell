<?php

$curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://platform.clickatell.com/messages',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => json_encode($data),
      CURLOPT_HTTPHEADER => array(
        'Authorization: kvTFG_7zQL2mLBZPnLG17Q==',
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    
    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
    }
    curl_close($curl);
    
    if (isset($error_msg)) {
        // TODO - Handle cURL error accordingly
    }

    ?>