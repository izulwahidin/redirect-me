<?php
define("default", "https://Twitter.com");


$redirs = [
  "ID" => "https://fb.com",
  "SG" => "https://yahoo.com",
]


$srv = (object) $_SERVER;

// Redirect to matched country
foreach (@$redirs ?? [] as $c => $url){
  $rx = "/$c/i";
  if (strcasecmp($c,$srv->HTTP_X_VERCEL_IP_COUNTRY) === false) header("Location: ". $url)
}

// Redirect to default url
header("Location: ". default)
