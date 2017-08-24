<?php

namespace App\Routing\Filter;

use Cake\Event\Event;
use Cake\Routing\DispatcherFilter;

class JsonFilter extends DispatcherFilter
{
    /**
     * @param Event $event
     * @return mixed
     *
     * chech if request url return json
     */
    public function beforeDispatch(Event $event)
    {
        $request = $event->data['request'];
        $request->url = $request->url.'.json';
        return $request;
    }
}