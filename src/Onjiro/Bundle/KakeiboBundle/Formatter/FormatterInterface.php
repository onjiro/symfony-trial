<?php

namespace Onjiro\Bundle\KakeiboBundle\Formatter;

use Symfony\Component\HttpFoundation\Request;

interface FormatterInterface
{
    /**
     * 渡されたデータをフォーマットしてレスポンスを返します.
     *
     * @param $data array フォーマット対象のデータ
     * @param $req Request リクエストオブジェクト
     * @return フォーマットされたレスポンス
     */
    public function format(array $data, Request $req);
}
