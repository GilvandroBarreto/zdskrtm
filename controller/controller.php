<?php
// load Composer
require '../vendor/autoload.php';


use Zendesk\API\HttpClient as ZendeskAPI;

$subdomain = "rotamed";
$username  = "gilvandro.junior@rotamed.com.br"; // replace this with your registered email
$token     = "7dAwrWXcZy8Q3HAEojZt4fciXb73E4Z6XN976xdh"; // replace this with your token

$client = new ZendeskAPI($subdomain);
$client->setAuth('basic', ['username' => $username, 'token' => $token]);
?>