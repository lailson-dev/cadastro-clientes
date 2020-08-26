<?php

use app\models\site\User;

$user  = new User;
$users = $user->show();

$layout->add('site/UserList');