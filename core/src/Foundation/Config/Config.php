<?php namespace Foundation\Config;

/**
 * Class Config
 * @package Foundation\Config
 *
 * TODO: IMPLEMENT NESTING SET AND GET
 */
class Config
{
    /**
     * App config files
     *
     * @var array
     */
    private static $config_files = array
    (
        'app' => 'app.php',
        'db'  => 'database.php'
    );

    /**
     * Default Config Files path
     *
     * @var string
     */
    private static $config_files_path = 'app/config';

    /**
     * A cache of the Config items.
     *
     * @var array
     */
    protected static $Config = array();

    /**
     * Set Item in Config
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set($key, $value)
    {
        //-- set value
        static::$Config[$key] = $value;
    }

    /**
     * Get Item/s from Config
     *
     * @param string|null $key
     * @return array
     */
    public static function get($key = null)
    {
        //-- return item or null if not found
        return (!is_null($key) ? static::$Config[$key] : static::$Config);
    }

    /**
     * Remove Item from config
     *
     * @param string $key
     */
    public static function remove($key)
    {
        unset(static::$Config[$key]);
    }

    /**
     * Load Environments
     *
     * @param array $environments
     * @throws \Exception
     */
    public static function loadEnvironments($environments)
    {
        //-- load environment config files
        foreach ($environments as $environment => $use)
        {
            //-- if use then load specific
            if ($use) static::$config_files_path .= DIRECTORY_SEPARATOR.$environment;
        }

        if (is_dir(static::$config_files_path))
        {
            foreach (static::$config_files as $key => $file)
            {
                $file = include_once static::$config_files_path.DIRECTORY_SEPARATOR.$file;
                static::set($key, $file);
            }
        }
        else throw new \Exception('Create Config folder!');
    }
} 