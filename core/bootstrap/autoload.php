<?php
/**
 * Register The Composer Auto Loader
 *
 * Composer provides a convenient, automatically generated class loader
 * for our application. We just need to utilize it! We'll require it
 * into the script here so that we do not have to worry about the
 * loading of any our classes "manually". Feels great to relax.
 */
require __DIR__.DIRECTORY_SEPARATOR.'../../vendor/autoload.php';

/**
 * Setup Patchwork UTF-8 Handling
 *
 * The Patchwork library provides solid handling of UTF-8 strings as well
 * as provides replacements for all mb_* and iconv type functions that
 * are not available by default in PHP. We'll setup this stuff here.
 */
Patchwork\Utf8\Bootup::initMbstring();

/**
 * Register Application Namespaces
 */
$classLoader = new Versionable\Autoload\Autoload();

//-- add namespaces
$namespaces = require dirname(__DIR__).DIRECTORY_SEPARATOR.'autoload'.DIRECTORY_SEPARATOR.'namespaces.php';
$classLoader->registerNamespaces($namespaces);

//-- register
$classLoader->register();