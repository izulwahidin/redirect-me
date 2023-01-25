<?php
$redirs = [
  "ID" => "https://shope.ee/7f1epV4n1Q",
  "US" => "https://yahoo.com",
  "dafault" => "https://www.highcpmrevenuenetwork.com/z9zmjzbzb?key=e6e74edb6e795c057a05cd8630b1afcd",
];
$srv = (object) $_SERVER;

var_dump($srv->HTTP_X_VERCEL_IP_COUNTRY);die();

// Redirect to matched country
foreach (@$redirs ?? [] as $country => $url){
  $rx = "/$country/i";
  if (isset($srv->HTTP_X_VERCEL_IP_COUNTRY) && strcasecmp($country, $srv->HTTP_X_VERCEL_IP_COUNTRY) === 0){
    header("Location: ". $url);
  }
}

// Redirect to default url
header("Location: ".$redirs['dafault']);



function is_bot(){
    return isset($srv->HTTP_USER_AGENT) && preg_match('/rambler|abacho|acoi|accona|aspseek|altavista|estyle|scrubby|lycos|geona|ia_archiver|alexa|sogou|skype|facebook|twitter|pinterest|linkedin|naver|bing|google|yahoo|duckduckgo|yandex|baidu|teoma|xing|java\/1.7.0_45|bot|crawl|slurp|spider|mediapartners|\sask\s|\saol\s/i', $srv->HTTP_USER_AGENT) ? true : false;
}
