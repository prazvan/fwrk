<?php namespace Foundation;

use Foundation\Environment\Environment;
use Foundation\Config\Config;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Application
 * @package Foundation
 */
final class Application extends Environment
{
    /**
     * The framework version.
     *
     * @var string
     */
    const VERSION = '1.0-dev';

    /**
     * Indicates if the application has "booted".
     *
     * @var bool
     */
    protected $booted = false;

    /**
     * @var Request
     */
    private $Request;

    /**
     * @var Response
     */
    private $Response;

    /**
     * New App Instance
     *
     * @param Request $Request
     */
    public function __construct(Request $Request = null)
    {
        //-- handle request
        $this->handleRequest($Request ?: Request::createFromGlobals());
    }

    public function run()
    {
        print_r(Config::get());

//        $response = $this->handleResponse();

    }

    /**
     * Handle Request
     *
     * @param Request $Request
     * @return Request
     */
    private function handleRequest(Request $Request)
    {
        return ($this->Request = $Request);
    }

    /**
     * Handle Response
     *
     * @param Response $Response
     * @return Response
     */
    private function handleResponse(Response $Response)
    {
        return ($this->Response = $Response);
    }
}