<?php

$cliprz->router->index('welcome');

$cliprz->router->rule(array(
    'regex' => 'welcome',
    'class' => 'welcome'
));

?>