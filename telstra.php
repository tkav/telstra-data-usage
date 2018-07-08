<?php

//  Export Telstra Group Usage Data to CSV
//  By Tom Kavanagh https://github.com/tkav/telstra-data-usage

Class Telstra {

  function login($Username, $Password) {
      $url = 'https://telstra.com/siteminderagent/SMLogin/preLogin.do';
      $ch = curl_init();
      $fields = array(
          'user' => $Username,
          'password' => $Password,
          'TARGET' => '',
          'smsauthreason' => 0,
          'error_target' => '',
          'final_target' => '',
          'postpreservationdata' => '',
          'generallogondata' => ''
          );
      $data = http_build_query($fields);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_COOKIEJAR, 'session.txt');
      curl_setopt($ch, CURLOPT_COOKIEFILE, 'session.txt');
  	  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 40);
      $buffer = curl_exec($ch);
      curl_close($ch);
      return $buffer;
  }

  function getGroupUsage($csv="telstra_usage.csv",$detailed=0) {
      $url = 'https://es.telstra.com/MobileDataUsageMeter/csvdownload.do';
      if ($detailed == 1) {
        $url = $url.'?typeOfDownload=on';
      }
      $ch = curl_init();
      $fp = fopen($csv, "w");
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_COOKIEJAR, 'session.txt');
      curl_setopt($ch, CURLOPT_COOKIEFILE, 'session.txt');
      curl_setopt($ch, CURLOPT_FILE, $fp);
  	  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 40);
      $buffer = curl_exec($ch);
      fclose($fp);
      curl_close($ch);
      return $buffer;
  }

}

?>
