<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new application instance
| which serves as the "glue" for all the components.
|
*/
$app = new \Foundation\Application;

/**
 * Set Application Environments. And set which to use
 */
$app->setEnvironments(array
(
    'development' => true,
    'production'  => false,
));

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
*/
return $app;