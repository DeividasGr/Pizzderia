<?php

namespace App;

use Core\FileDB;
use Core\Router;
use Core\Session;
use App\Cookie;

class app
{
    public static FileDB $db;
    public static Session  $session;
    public static Cookie  $cookie;
    public static Router $router;

    public function __construct()
    {
        self::$db = new FileDB(DB_FILE);
        self::$db->load();
        self::$session = new Session();
        self::$cookie = new Cookie('testCookie');
        self::$router = new Router();
    }

    public function run()
    {
        print self::$router::run();
    }

    public function __destruct()
    {
        self::$db->save();
    }

}