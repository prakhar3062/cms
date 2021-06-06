<?php

namespace Demo;

include_once('../autoload.php');
include_once('demo.php');

use Demo\Test;

$USER_EMAIL = 'bestteamtrando@gmail.com'; // change this with your own copyleaks email.
$USER_KEY = 'cd5c3440-2c38-44e5-9bd6-2439681d15e5'; // change this with your own copyleaks API key.
$WEBHOOK_URL = 'https://glacial-refuge-96501.herokuapp.com/10b0z2w1';

$test = new Test();
$test->run($USER_EMAIL, $USER_KEY, $WEBHOOK_URL);
