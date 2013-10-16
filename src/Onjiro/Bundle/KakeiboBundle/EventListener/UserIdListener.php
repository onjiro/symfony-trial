<?php

namespace Onjiro\Bundle\KakeiboBundle\EventListener;

use Symfony\Component\HttpFoundation\Response;

class UserIdListener
{
    public function __construct($requestContext)
    {
        $this->requestContext = $requestContext;
    }

    public function onRequestEvent($event)
    {
        // TODO ignore する url とか指定できるようにしてもよさそう
        $req = $event->getRequest();
        if (strpos($req->getPathInfo(), '/_') === 0) return;

        echo spl_object_hash($this).'<br>'; // オブジェクトハッシュでインスタンス確認
        $uid = $req->get('uid');
        echo "set uid: $uid<br>";
        $this->requestContext->set('uid', $uid);
    }

    public function onResponseEvent($event)
    {
        if (strpos($event->getRequest()->getPathInfo(), '/_') === 0) return;

        echo spl_object_hash($this).'<br>'; // オブジェクトハッシュでインスタンス確認
        echo 'get uid: '.$this->requestContext->get('uid').'<br>'.PHP_EOL;
    }
}