<?php
namespace Onjiro\Bundle\LotBundle\Lot;

class RateAllocatedLot extends LotBase
{
    /**
     * @var array レートと抽選の景品をセットで保持する.
     * array(
     *   array('rate' => <レート※>, 'gift' => <景品>) [, ...]
     * )
     * ※…レートは整数を期待、合計した結果は100じゃなくてOK
     */
    private $ratedGifts = [];

    public function __construct(array $giftWithRates, $ratekey = 'rate', $giftKey = 'gift')
    {
        $this->ratedGifts = array_map(function($one) {
            return ['rate' => $one[$rateKey], 'gift' => $one[$giftKey]];
        }, $giftWithRate);
    }

    public function calculateSumRate()
    {
        // TODO
        return 900;
    }

    /**
     * Factory 等での生成時に gift or lot を追加する用メソッド
     */
    public function addGift($rate, $gift)
    {
        // TODO
    }

    /**
     * @override
     */
    protected function doProvide()
    {
        $point = mt_rand(0, $this->calculateSumRate);
        foreach($this->ratedGifts as $one) {
            if (($point -= $one['rate']) <= 0) return $one['gift'];
        }
    }
}