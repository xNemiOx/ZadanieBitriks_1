<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

return array (
  'utf_mode' =>
  array (
    'value' => true,
    'readonly' => true,
  ),
  'cache_flags' =>
  array (
    'value' =>
    array (
      'config_options' => 3600.0,
      'site_domain' => 3600.0,
    ),
    'readonly' => false,
  ),
  'cookies' =>
  array (
    'value' =>
    array (
      'secure' => false,
      'http_only' => true,
    ),
    'readonly' => false,
  ),
    'exception_handling' => array(
        'value' => array(
            'debug' => true,
            'handled_errors_types' => E_ALL & ~E_NOTICE,
            'exception_errors_types' => E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR,
            'ignore_silence' => false,
            'assertion_throws_exception' => true,
            'assertion_error_type' => E_USER_ERROR,
            'log' => array(
                'file' => $_SERVER['DOCUMENT_ROOT'] . '/bitrix/logs/bitrix.log',
                'log_size' => 1000000,
            ),
        ),
    ),
  'connections' =>
  array (
    'value' =>
    array (
      'default' =>
      array (
        'className' => '\\Bitrix\\Main\\DB\\MysqliConnection',
        'host' => 'localhost',
        'database' => 'tuman2eq_2',
        'login' => 'tuman2eq_2',
        'password' => '11@@33QQwwEE',
        'options' => 2.0,
      ),
    ),
    'readonly' => true,
  ),
  'crypto' =>
  array (
    'value' =>
    array (
      'crypto_key' => '047b8bea717c02936083a835a90aaf00',
    ),
    'readonly' => true,
  ),
);
