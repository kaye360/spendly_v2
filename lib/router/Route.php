<?php
/**
 * 
 * Route Facade Class
 * 
 * @author Josh Kaye
 * https://joshkaye.dev
 * 
 * Allows developer defined routing
 * 
 * 
 * Wraps the Router Class to make defining routes cleaner
 * 
 */
declare(strict_types=1);
namespace lib\Router\Route;

use lib\Router\Router\Router;



class Route {

    private static $instance = null;
    private static $router;


    public function __construct()
    {
        self::$router = new Router();
    }

    /**
     * 
     * @method Singleton instance method
     * 
     */
    public static function init()
    {
        if(self::$instance === null)
        {
            self::$instance = new Route();
        }
        return self::$instance;
    }

    /**
     * 
     * @method Get Request Facade
     * 
     */
    public static function get(string $route, callable $method, int $response_code = 200)
    {
        self::$router->get($route, $method, $response_code);
    }

    /**
     * 
     * @method Post Request Facade
     * 
     */
    public static function post(string $route, callable $method, int $response_code = 200)
    {
        self::$router->post($route, $method, $response_code);
    }

    /**
     * 
     * @method Any HTTP Request type Facade
     * 
     */
    public static function any(string $route, callable $method, int $response_code = 200)
    {
        self::$router->any($route, $method, $response_code);
    }

    /**
     * 
     * Rendder requested route Facade
     * 
     */
    public static function render()
    {
        self::$router->render();
    }
}