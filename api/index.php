<?php
$redirs = [
  "ID" => "https://fb.com",
  "SG" => "https://yahoo.com",
  "dafault" => "https://Twitter.com",
];

$srv = (object) $_SERVER;

// Redirect to matched country
foreach (@$redirs ?? [] as $country => $url){
  $rx = "/$c/i";
  if (strcasecmp($country, $srv->HTTP_X_VERCEL_IP_COUNTRY) === false) header("Location: ". $url);
}

// Redirect to default url
header("Location: ".$redirs['default']);
