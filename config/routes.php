<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder) {
        $builder->connect('/elfinder', ['controller' => 'Elfinder', 'action' => 'index'])
        ->setExtensions(['json'])
        ->setMethods(['GET']);
        $builder->connect('/elfinder/connect', ['controller' => 'Elfinder', 'action' => 'connect']);
        $builder->prefix('Admin', function ($routes) {
            $routes->setExtensions(['json', 'xml']);
            // Because you are in the admin scope,
            // you do not need to include the /admin prefix
            // or the admin route element.
            $routes->connect('/', ['controller'=> 'Dashboard', 'action' => 'index']);
            $routes->connect('/posts', ['controller'=> 'Posts', 'action' => 'index']);
            $routes->connect('/posts/add', ['controller'=> 'Posts', 'action' => 'add']);
            $routes->connect('/posts/delete/{id}', ['controller'=> 'Posts', 'action' => 'delete'])->setPass(['id']);
            $routes->connect('/posts/edit/{id}', ['controller'=> 'Posts', 'action' => 'edit'])->setPass(['id']);

            $routes->connect('/programs', ['controller'=> 'Programs', 'action' => 'index']);
            $routes->connect('/programs/add', ['controller'=> 'Programs', 'action' => 'add']);
            $routes->connect('/programs/delete/{id}', ['controller'=> 'Programs', 'action' => 'delete'])->setPass(['id']);
            $routes->connect('/programs/edit/{id}', ['controller'=> 'Programs', 'action' => 'edit'])->setPass(['id']);

            $routes->connect('/episodes', ['controller'=> 'Episodes', 'action' => 'index']);
            $routes->connect('/episodes/add', ['controller'=> 'Episodes', 'action' => 'add']);
            $routes->connect('/episodes/delete/{id}', ['controller'=> 'Episodes', 'action' => 'delete'])->setPass(['id']);
            $routes->connect('/episodes/edit/{id}', ['controller'=> 'Episodes', 'action' => 'edit'])->setPass(['id']);

            $routes->connect('/posts', ['controller'=> 'Posts', 'action' => 'index']);
            $routes->connect('/posts/add', ['controller'=> 'Posts', 'action' => 'add']);
            $routes->connect('/posts/delete/{id}', ['controller'=> 'Posts', 'action' => 'delete'])->setPass(['id']);
            $routes->connect('/posts/edit/{id}', ['controller'=> 'Posts', 'action' => 'edit'])->setPass(['id']);

            $routes->connect('/users', ['controller'=> 'Users', 'action' => 'index']);
            $routes->connect('/users/add', ['controller'=> 'Users', 'action' => 'add']);
            $routes->connect('/users/delete/{id}', ['controller'=> 'Users', 'action' => 'delete'])->setPass(['id']);
            $routes->connect('/users/edit/{id}', ['controller'=> 'Users', 'action' => 'edit'])->setPass(['id']);
        });
        $builder->prefix('Api', function ($routes) {
            $routes->setExtensions(['json', 'xml']);
            $routes->connect('/episodes/{id}', ['controller' => 'Episodes', 'action' => 'index'])->setPass(['id'])->setPatterns(['id' => '[0-9]+']);
        });
        $builder->setExtensions(['json', 'xml']);

        $builder->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/users/signup', ['controller' => 'Users', 'action' => 'signup']);
        $builder->connect('/users/forget', ['controller' => 'Users', 'action' => 'forget']);
        $builder->connect('/users/logout', ['controller' => 'Users', 'action' => 'logout']);


        $builder->connect('/blog',['controller' => 'Posts', 'action' => 'index']);
        $builder->connect('/blog/{slug}-{id}',['controller' => 'Posts', 'action' => 'detail'])
        ->setPass(['slug','id'])
        ->setPatterns([
                'slug' => '[a-z0-9\_\-]+',
                'id' => '[0-9]+',
        ]);

        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->get('/sitemap', ['controller' => 'Sitemap', 'action' => 'index'])->setExtensions(['xml']);
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'index']);
        $builder->connect('/programs', ['controller' => 'Programs']);
        $builder->connect('/program/{slug}-{id}', ['controller' => 'Programs', 'action' => 'show'])
        ->setPass(['slug','id'])
        ->setPatterns([
                'slug' => '[a-z0-9\_\-]+',
                'id' => '[0-9]+',
        ]);

        $builder->get('/contact', ['controller' => 'Contact', 'action' => 'index']);
        $builder->post('/contact', ['controller' => 'Contact', 'action' => 'postcontact']);

        $builder->resources('comments');
        $builder->resources('posts');
        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/images/{path}', ['controller' => 'Images', 'action' => 'show'])
            ->setPass(['path'])
            ->setPatterns([
                'path' => '(.*)'
            ]);

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        //$builder->fallbacks();
    });

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder) {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
