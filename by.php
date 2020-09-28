<?php
/*
by frenchvlad
hackerone : https://hackerone.com/frenchvlad
*/
$search = file("website.txt",FILE_IGNORE_NEW_LINES);
foreach($search as $site) {
  $curlx = curl_init($site);
  curl_setopt($curlx, CURLOPT_CONNECTTIMEOUT ,2);
  curl_exec($curlx);
  $http_code = curl_getinfo($curlx, CURLINFO_HTTP_CODE);
  echo $site." : ".$http_code."\n";
  if($http_code == 200 OR $http_code == 403 OR $http_code == 301 OR $http_code == 404 OR $http_code == 308 OR $http_code == 302) {
      file_put_contents("paris.txt",$site." : ".$http_code."\n",FILE_APPEND);
  }
}
?>
