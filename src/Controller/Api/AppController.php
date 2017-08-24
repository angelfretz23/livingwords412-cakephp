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
namespace App\Controller\Api;

use Cake\Cache\Cache;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\BadRequestException;
use FFMpeg\FFProbe;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 *
 */
class AppController extends Controller
{

    protected $query;

    /**
     * Requested user
     *
     * @var
     */
    protected $_User;

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
        $this->_User = $this->getUser();
        $this->query = $this->request->query;
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     *
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars)
            && in_array(
                $this->response->type(), ['application/json', 'application/xml']
            )
        ) {
            $this->set('_serialize', true);
        }
        $this->response->header('X-Powered-By', 'CRUD 4.0');
    }

    public function afterFilter(Event $event)
    {
        return $this->response;
    }

    /**
     * return response data, encoded in json format
     *
     * @param array|object|string $data
     * @param int $code
     * @param mixed $key Key for store to cache
     *
     *
     * @return \Cake\Network\Response|null
     */
    protected function jsonResponse($inputData, $code = 200, $cacheKey = false)
    {
        $this->response->body(json_encode([
            'message' => $inputData
        ]));
        if (is_array($inputData) ||  is_object($inputData)) {
            $this->response->body(json_encode($inputData));
        }
        $this->response->type('json');
        $this->response->statusCode($code);
        if ($cacheKey) {
            Cache::write($cacheKey, $inputData);
        }

        return $this->response;
    }

    /**
     * Return cache response
     *
     * @param $data
     * @return \Cake\Network\Response|null
     */
    protected function cacheResponse($data)
    {
        $this->response->body(json_encode($data));
        //$this->response->statusCode(304);
        $this->response->type('json');

        return $this->response;
    }

    /**
     * Get requested user from cache
     *
     * @return mixed
     */
    private function getUser()
    {
        $token = $this->request->header('ACCESS-TOKEN');
        if (!empty($token)) {
            return Cache::read('user_' . $token);
        }
    }

    /**
     * Check if user have access to create this request
     *
     * @param $user_id
     *
     * @return bool
     */
    protected function checkUser($user_id)
    {
        if ($this->_User->id == $user_id) {
            return true;
        }
        throw new BadRequestException(__('failed_check'));
    }

}
