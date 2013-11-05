<?php
namespace Onjiro\Bundle\KakeiboBundle\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Onjiro\Bundle\KakeiboBundle\Formatter\FormatterInterface;

class ViewEventListener
{
    /** @var フォーマットタイプ文字列に対応するフォーマッター実装のマップ */
    private $formatters = array();

    public function __construct($formatMapping)
    {
        if (empty($formatMapping)) {
            throw new Exception();
        }
        $this->formatMapping = $formatMapping;
    }

    public function onViewEvent(GetResponseForControllerResultEvent $event)
    {
        $path = $event->getRequest()->getPathInfo();
        foreach ($this->formatMapping as $pattern => $format) {
            echo "|$pattern| ".$path.PHP_EOL;
            echo preg_match("|$pattern|", $path).'<br>'.PHP_EOL;
            if (preg_match("|$pattern|", $path) && isset($this->formatters[$format])) {
                $formatter = $this->formatters[$format];
                $event->setResponse($formatter->format($event->getControllerResult(), $event->getRequest()));
                break;
            }
        }
    }

    /**
     * @param $format str 対応するフォーマット
     * @param $formatter FormatterInterface タイプを処理するフォーマッタ
     */
    public function addFormatter($format, FormatterInterface $formatter)
    {
        $this->formatters[$format] = $formatter;
    }
}