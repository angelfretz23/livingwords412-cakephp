<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
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
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

/**
 * web
 */
Router::scope('/', function (RouteBuilder $routes) {
    Router::prefix('admin', function ($routes) {
        $routes->connect('/', ['controller' => 'Admin', 'action' => 'index']);
        $routes->connect('/login', ['controller' => 'Admin', 'action' => 'login']);
        $routes->connect('/register', ['controller' => 'Admin', 'action' => 'register']);
        $routes->connect('/users/manage', ['controller' => 'Admin', 'action' => 'users']);
        $routes->connect('/users/ban', ['controller' => 'Admin', 'action' => 'ban']);
        $routes->connect('/users/content-owner', ['controller' => 'Admin', 'action' => 'contentOwner']);
        $routes->connect('/logout', ['controller' => 'Admin', 'action' => 'logout']);
        $routes->connect('/first-step/:id', ['controller' => 'Manage', 'action' => 'firstStep'],['pass' => ['id']]);


        $routes->connect('/media', ['controller' => 'Manage', 'action' => 'selectMediaType']);
        $routes->connect('/fillform', ['controller' => 'Manage', 'action' => 'fillTheForm']);
        $routes->connect('/choosebook', ['controller' => 'Manage', 'action' => 'choosebook']);
        $routes->connect('/choosechapter/:id', ['controller' => 'Manage', 'action' => 'choosechapter'],['pass' => ['id']]);
        $routes->connect('/chooseversus/:id', ['controller' => 'Manage', 'action' => 'chooseversus'],['pass' => ['id']]);
        $routes->connect('/choosebook-multiply', ['controller' => 'Manage', 'action' => 'choosebookMultiply']);
        $routes->connect('/choosechapterAjax', ['controller' => 'Manage', 'action' => 'choosechapterAjax']);
        $routes->connect('/chooseversusAjax', ['controller' => 'Manage', 'action' => 'chooseversusAjax']);
        $routes->connect('/saveseversus', ['controller' => 'Manage', 'action' => 'saveseversus']);
        $routes->connect('/havesaved', ['controller' => 'Manage', 'action' => 'havesaved']);
        $routes->connect('/save-media-admin', ['controller' => 'Manage', 'action' => 'saveMediaAdmin']);
        $routes->connect('/see-versus-content/:id', ['controller' => 'Manage', 'action' => 'seeVersusContent'],['pass' => ['id']]);
        $routes->connect('/delete-book-admin/:id-:versusID', ['controller' => 'Manage', 'action' => 'deleteBookAdmin'],['pass' => ['id','versusID']]);
        $routes->connect('/delete-sermon-admin/:id-:versusID', ['controller' => 'Manage', 'action' => 'deleteSermonAdmin'],['pass' => ['id','versusID']]);
        $routes->connect('/delete-music-admin/:id-:versusID', ['controller' => 'Manage', 'action' => 'deleteMusicAdmin'],['pass' => ['id','versusID']]);
        $routes->connect('/delete-movie-admin/:id-:versusID', ['controller' => 'Manage', 'action' => 'deleteMovieAdmin'],['pass' => ['id','versusID']]);
        $routes->connect('/selected_versus', ['controller' => 'Manage', 'action' => 'selectedVersus']);
        $routes->connect('/delete-tag', ['controller' => 'Manage', 'action' => 'deleteTag']);
        $routes->connect('/look_file/:id-:type', ['controller' => 'Manage', 'action' => 'lookFile'],['pass' => ['id','type']]);
        $routes->connect('/delete_file/', ['controller' => 'Manage', 'action' => 'deleteFile']);
        $routes->connect('/save-chosen-verses', ['controller' => 'Manage', 'action' => 'saveChosenVerses']);
        $routes->connect('/clear-selected-verses', ['controller' => 'Manage', 'action' => 'clearSelectedVerses']);



        $routes->connect('/second-step/:id', ['controller' => 'Manage', 'action' => 'secondStep'],['pass' => ['id']]);
        $routes->connect('/thirt-step/:id', ['controller' => 'Manage', 'action' => 'thirtStep'],['pass' => ['id']]);
        $routes->connect('/edit/:id', ['controller' => 'Manage', 'action' => 'editData'],['pass' => ['id']]);
        $routes->connect('/edit-book/:id', ['controller' => 'Manage', 'action' => 'editBook'],['pass' => ['id']]);
        $routes->connect('/delete-book/:id', ['controller' => 'Manage', 'action' => 'deleteBook'],['pass' => ['id']]);
        $routes->connect('/delete-sermon/:id', ['controller' => 'Manage', 'action' => 'deleteSermon'],['pass' => ['id']]);
        $routes->connect('/delete-music/:id', ['controller' => 'Manage', 'action' => 'deleteMusic'],['pass' => ['id']]);
        $routes->connect('/delete-movie/:id', ['controller' => 'Manage', 'action' => 'deleteMovie'],['pass' => ['id']]);
        $routes->connect('/edit-sermon/:id', ['controller' => 'Manage', 'action' => 'editSermon'],['pass' => ['id']]);
        $routes->connect('/edit-music/:id', ['controller' => 'Manage', 'action' => 'editMusic'],['pass' => ['id']]);
        $routes->connect('/edit-movie/:id', ['controller' => 'Manage', 'action' => 'editMovie'],['pass' => ['id']]);
        $routes->connect('/update-book/:id', ['controller' => 'Manage', 'action' => 'updateBook'],['pass' => ['id']]);
        $routes->connect('/update-sermon/:id', ['controller' => 'Manage', 'action' => 'updateSermon'],['pass' => ['id']]);
        $routes->connect('/update-music/:id', ['controller' => 'Manage', 'action' => 'updateMusic'],['pass' => ['id']]);
        $routes->connect('/update-movie/:id', ['controller' => 'Manage', 'action' => 'updateMovie'],['pass' => ['id']]);
        $routes->connect('/fourth-step', ['controller' => 'Manage', 'action' => 'fourthStep']);
        $routes->connect('/save-media', ['controller' => 'Manage', 'action' => 'saveMedia']);
        $routes->connect('/:controller');
        $routes->fallbacks('DashedRoute');
    });
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/register', ['controller' => 'Users', 'action' => 'register']);
    $routes->connect('/dashboard', ['controller' => 'Users', 'action' => 'dashboard']);
});

/**
 * end web
 */


    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    // $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);


/**
 * api
 */
    Router::scope('/api', function ($routes) {
        Router::prefix('api', function ($routes) {
        $routes->extensions(['json']);

        $routes->resources('Users', function ($routes) {
            $routes->connect('/activity', [
                'controller' => 'Users',
                'action' => 'activity'
            ]);
        });
//            $routes->resources('News');

            /**
             * user
             */

        $routes->connect('/users/register', ['controller' => 'Users', 'action' => 'register']);
        $routes->connect('/users/facebook', ['controller' => 'Users', 'action' => 'facebookRegistration']);
        $routes->connect('/users/google', ['controller' => 'Users', 'action' => 'googleRegistration']);
        $routes->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
        $routes->connect('/users/logout', ['controller' => 'Users', 'action' => 'logout']);
        $routes->connect('/users/reset', ['controller' => 'Users', 'action' => 'resetPassword']);
        $routes->connect('/users/check', ['controller' => 'Users', 'action' => 'checkCode']);
//        $routes->connect('/users/password/reset', ['controller' => 'Users', 'action' => 'successReset']);
        $routes->connect('/users/success', ['controller' => 'Users', 'action' => 'successCode']);

            /**
             * bible
             */

            $routes->resources('Bible');
            $routes->connect('/books', ['controller' => 'Bible', 'action' => 'getBooksName']);
            $routes->connect('/seremon', ['controller' => 'Uploads', 'action' => 'seremon']);
            $routes->connect('/music', ['controller' => 'Uploads', 'action' => 'music']);
            $routes->connect('/movie', ['controller' => 'Uploads', 'action' => 'movie']);
            $routes->connect('/book', ['controller' => 'Uploads', 'action' => 'book']);
            $routes->connect('/high-lights', ['controller' => 'Uploads', 'action' => 'highlights']);
            $routes->connect('/get/high-lights', ['controller' => 'Uploads', 'action' => 'getHighLights']);
            $routes->connect('/verse/get', ['controller' => 'GetVerseData', 'action' => 'getData']);
            $routes->connect('/history/save', ['controller' => 'Profile', 'action' => 'saveHistory']);
            $routes->connect('/media/save', ['controller' => 'Profile', 'action' => 'saveMyMedia']);
            $routes->connect('/favorite/save', ['controller' => 'Profile', 'action' => 'saveFavorites']);
            $routes->connect('/profile/history', ['controller' => 'Profile', 'action' => 'getUserProfileHistory']);
            $routes->connect('/profile/my-media', ['controller' => 'Profile', 'action' => 'getUserMyMedia']);
            $routes->connect('/profile/favorites', ['controller' => 'Profile', 'action' => 'getUserFavorites']);
            $routes->connect('/get/book-type', ['controller' => 'Bible', 'action' => 'getBookType']);

        $routes->fallbacks('DashedRoute');
    });
    });
/**
 * end api
 */


    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    // $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */



/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
