<?php

function recordView() {
  $hit = file_get_contents(__DIR__ . "/total_views.txt");  //kropka to konkatenacja, __DIR__ - folder roboczy skryptu
  file_put_contents(__DIR__ . "/total_views.txt", $hit + 1);
}

function getTotalViewCount() {
  return file_get_contents(__DIR__ . "/total_views.txt");
}

function addUniqueIP($ip=NULL) {
  $ip = ($ip!=NULL) ? $ip : getIPAddress();
  $iplist = file_get_contents(__DIR__ . "/visitors_ips.txt");
  $iplist = explode(",", $iplist);
  if (!in_array(trim($ip), $iplist)) {
    $file = fopen(__DIR__ . "/visitors_ips.txt", 'a+');  //append - dodaj na koniec pliku
    fwrite($file, "," . trim($ip));
    fclose($file);
  }
}

function getUniqueVisitorsCount() {
  $file = file_get_contents(__DIR__ . "/visitors_ips.txt");
  $file = explode(",", $file);
  if ($file[0] === "") return count($file) - 1;  //gdy separator znajduje się na początku pliku
  return count($file);
}

function getIPAddress() {

  $ipaddress = NULL;

  if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else if (isset($_SERVER['REMOTE_ADDR'])) {
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  }

  if (filter_var($ipaddress, FILTER_VALIDATE_IP)) {  //sprawdzanie czy to jest poprawny adres IP (
    //klient może nadpisywać zmienne 'HTTP_CLIENT_IP' i 'HTTP_X_FORWARDED_FOR' czym chce!) (ale są przydatne gdy ktoś używa proxy, wtedy REMOTE_ADDR daje błędny adres proxy)
    return $ipaddress;
  } else {
    return NULL;
  }
  
}
