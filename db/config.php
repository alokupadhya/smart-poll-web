<?php
/*
*	This is the configuration file for the whole framework
*	Please set the various constants and variables below
*/

// array to hold all the configuration details
$config = array();

// Define if environment is production or development
// dev - Development Environment
// pro - Production Environment
$config['env'] = 'dev';
 
// setting $debug to true will echo out all the errors
$config['debug'] = TRUE;

if($config['env'] == 'pro') {
    // set the values for production environment
    //$config['base_url'] = 'http://test.madsstudio.co.in';
    $config['db_host'] = '127.0.0.1';
    $config['db_name'] = 'madsstudio';
    $config['db_user'] = 'sysbot';
    $config['db_pass'] = '13urmila';
}

if ($config['env'] == 'dev') {
    // set the values for the development environment
    //$config['base_url'] = 'http://localhost/smartpolling';
    $config['db_host'] = 'localhost';
    $config['db_name'] = 'smartpolling';
    $config['db_user'] = 'root';
    $config['db_pass'] = 'ak479@mads';
}

?>
