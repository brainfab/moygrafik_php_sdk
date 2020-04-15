[MoyGrafik](https://www.moygrafik.ru) API PHP SDK - Unofficial
==============================================================

Installation
------------

Require this package with composer:

`` composer require brainfab/moygrafik_php_sdk ``

## Documentation
Check [wiki](https://github.com/brainfab/moygrafik_php_sdk/wiki) for full documentation

Usage example:
--------------

```php
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

$companies = $client->companies()->listCompanies();

foreach ($companies as $company) {
    echo $company->name . "<br>";
}

```
