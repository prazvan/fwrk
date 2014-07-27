<?php namespace Foundation\Environment;
use Foundation\Config\Config;

/**
 * Class Environment
 * @package Foundation\Environment
 */
abstract class Environment
{
    /**
     * Default Environment
     *
     * @var null
     */
    public static $key = 'environment';

    /**
     * Set Application Environments
     *
     * @param array $environments
     * @return $this
     */
    public function setEnvironments($environments = array())
    {
        foreach ($environments as $environment => $use)
        {
            //-- set ENV to server
            if ($use) $_SERVER[static::$key] = $environment;
        }

        //-- load environments configs
        Config::loadEnvironments($environments);
    }

    /**
     * Get application environment or Check to see if the application uses a specific environment
     *
     * @param null|string $environment
     * @return bool|string
     */
    public static function environment($environment = null)
    {
        //-- by default we will
        $result = $_SERVER[static::$key];

        if ($environment) $result = $_SERVER[static::$key] == $environment;

        //-- return result
        return $result;
    }
}