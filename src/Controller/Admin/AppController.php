<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Cache\Cache;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    // For admin-panel
    public $languages;

    // For admin-panel
    public $default_language;

    // For production. A site language.
    public $site_locale;

    // public $direction = 'rtl';

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth');
        $this->loadComponent('Cookie');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event)
    {
        if (strpos($this->request->prefix, 'admin') !== false) {

            $this->set('default_language', Configure::read('default_language'));
            $this->set('languages', Configure::read('languages'));
            $this->set('modules', Configure::read('modules'));

            $this->Auth->config([
                'loginRedirect' => [
                    'controller' => 'Admin',
                    'action' => 'dashboard'
                ],
                'logoutRedirect' => [
                    'prefix' => 'admin',
                    'controller' => 'Admin',
                    'action' => 'login',
                ],
                'loginAction' => [
                    'controller' => 'Admin',
                    'action' => 'login',
                ],
                'authenticate' => [
                    'Form' => [
//                        'passwordHasher' => 'Default',
                        'fields' => ['username' => 'nickname', 'password' => 'password'],
                        'userModel' => 'administrators',
                    ]
                ],
                'flash' => [
                    'key' => 'auth',
                    'element' => 'error',
                ],
                'storage' => [
                    'className' => 'Session',
                    'key' => 'Auth.User'
                ],
//                'authError' => 'You are not authorized to access this page.'
            ]);

        }
    }

}