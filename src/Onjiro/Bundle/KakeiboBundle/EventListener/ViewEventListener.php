<?php
namespace Onjiro\Bundle\KakeiboBundle\EventListener;

use Symfony\Component\HttpFoundation\Response;

class ViewEventListener
{
    public function __construct($formatMapping, $formatters, $templating)
    {
        // TODO formatMapping が空だったらエラーにする

        $this->formatMapping = $formatMapping;
        $this->formatters = $formatters;
        $this->templating = $templating;
    }

    public function onViewEvent($event)
    {
        $path = $event->getRequest()->getPathInfo();
        foreach ($this->formatMapping as $pattern => $format) {
            if (preg_match("|$pattern|", $path)) {
                // TODO 対応するフォーマッターに処理を移譲する
                $event->setResponse($this->templating->renderResponse(
                    'OnjiroKakeiboBundle:Default:index.html.twig',
                    $event->getControllerResult()
                ));
                break;
            }
        }

        // TODO response が設定されていなかったらエラーにマッピング一覧を表示するか？
        // if ($event->hasResponse()) { ... }
    }
}