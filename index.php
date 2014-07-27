<?php

try
{
    /**
     * Register The Auto Loader
     */
    require __DIR__.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'bootstrap'.DIRECTORY_SEPARATOR.'autoload.php';

    /**
     * Start The App
     */
    $app = require __DIR__.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'bootstrap'.DIRECTORY_SEPARATOR.'start.php';

    /**
     * Run The Application
     */
    $app->run();
}
catch (Exception $ex)
{
    //-- die app
    die($ex->getMessage());
}