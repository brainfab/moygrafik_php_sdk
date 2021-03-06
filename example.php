<?php

require_once 'vendor/autoload.php';

session_start();

use Brainfab\MoyGrafik\MoyGrafik;

$OAUTH2_CLIENT_ID = 'your client id';
$OAUTH2_CLIENT_SECRET = 'your client secret';

$client = new MoyGrafik();
$client->setClientId($OAUTH2_CLIENT_ID);
$client->setClientSecret($OAUTH2_CLIENT_SECRET);

if (empty($_SESSION['_token'])) {
    $client->authenticate([
        'grant_type' => 'password',
        'username'   => 'your email',
        'password'   => 'your password',
    ]);

    $_SESSION['_token'] = $client->getAccessToken();
}

if (isset($_SESSION['_token'])) {
    $client->setAccessToken($_SESSION['_token']);
}

//get current user profile
$me = $client->users()->me();
echo $me->firstName.' '.$me->lastName.'<br>';

//get current user companies
$companies = $client->companies()->listCompanies();
foreach ($companies as $company) {
    echo $company->name . "<br>";
}
