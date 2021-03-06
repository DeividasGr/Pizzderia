<?php

use Core\Router;

Router::add('index', '/', '\App\Controllers\HomeController');
Router::add('index2', '/index.php', '\App\Controllers\HomeController');

Router::add('login', '/login', '\App\Controllers\LoginController', 'login');
Router::add('register', '/register', '\App\Controllers\RegisterController', 'register');
Router::add('add', '/add', '\App\Controllers\Admin\AddController', 'add');
Router::add('my', '/my', '\App\Controllers\Admin\MyController', 'my');
Router::add('list', '/list', '\App\Controllers\Admin\ListController', 'list');
Router::add('logout', '/logout', '\App\Controllers\Admin\LogoutController', 'logout');
Router::add('install', '/install', '\App\Controllers\InstallController', 'install');
Router::add('edit', '/edit', '\App\Controllers\Admin\EditController', 'edit');
Router::add('admin_orders', '/admin/orders', '\App\Controllers\Admin\OrdersController');
Router::add('user_orders', '/orders', '\App\Controllers\User\OrderController');
Router::add('admin_users', '/admin/users', '\App\Controllers\Admin\UserController');