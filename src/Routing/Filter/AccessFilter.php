<?php

namespace App\Routing\Filter;

use Cake\Event\Event;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Routing\DispatcherFilter;
use Cake\Cache\Cache;
use Symfony\Component\Config\Definition\Exception\Exception;
use Cake\ORM\TableRegistry;

class AccessFilter extends DispatcherFilter
{
    /**
     * Routes enabled for visit without registration/login in application
     *
     * @var array
     */
    private $accessibleRoutes = [
        '/api/users/login',
        '/api/users/register',
        '/api/users/facebook',
        '/api/users/google',
        '/api/users/reset',
        '/api/users/check',
        '/api/users/success',
        '/api/users/password/reset',
        '/api/bible',
        '/api/bible/1',
        '/api/news',
        '/api/books',
    ];

    /**
     * @param Event $event
     * @return bool
     *
     * parse url and check if in url exist '/api' ACCESS-TOKEN requeire else is web project and in web we will use session for user auth
     */
    public function beforeDispatch(Event $event)
    {
        $url = $event->data()['request']->url;
//        $url = $_SERVER['REQUEST_URI'];
        $parsedUrl = explode('/', $url);

        if($parsedUrl[0] == 'api'){

            $request = $event->data['request'];
            $token = $request->header('ACCESS-TOKEN');

            if ($this->checkAccessibleRoutes($request->here)) {
                return true;
            }
            if (!$token) {
                throw new BadRequestException('ACCESS-TOKEN required in this area');
            }
            if ($this->findInCache($token) || $this->findInTable($token)) {
                return true;
            }

            throw new UnauthorizedException('ACCESS-TOKEN does not exists');
        }
        }

    /**
     * This method check if need get access_token
     *
     * @param $url
     *
     * @return bool
     */
    private function checkAccessibleRoutes($url)
    {
        if (in_array($url, $this->accessibleRoutes)) {
            return true;
        }

        return false;
    }

    /**
     * Find user in cache
     *
     * @param $token
     *
     * @return mixed
     */
    private function findInCache($token)
    {
        return Cache::read('user_' . $token);
    }

    /**
     * Find user in table, and store to cache
     *
     * @param $token
     *
     * @return bool
     */
    private function findInTable($token)
    {
        $user = TableRegistry::get('users')
            ->find()
            ->where(['access_token' => $token])->first();
        if ($user) {
            Cache::write('user_' . $token, $user);
            return true;
        }
        return false;
    }

}