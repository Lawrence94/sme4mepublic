<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_SERVER['REQUEST_URI'])) {
    die('Access Denied');
}

define('APPROOT', realpath(__DIR__ . '/..') . DIRECTORY_SEPARATOR);

require_once __DIR__ . '/../vendor/autoload.php';


$jobby = new Jobby\Jobby();

//core application task
$jobby->add('processPayout', array(
    'command' => 'php ' . APPROOT . 'index.php Main/Dashboard/userStatus',
    'schedule' => '* * * * *',
    'output' => 'logs/payout.log',
    'enabled' => true,
));

//run
$jobby->run();
