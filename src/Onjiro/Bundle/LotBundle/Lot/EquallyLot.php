<?php
namespace Onjiro\Bundle\LotBundle\Lot;

class EquallyLot extends LotBase
{
    public function __construct(array $gifts)
    {
        $this->gifts = $gifts;
    }

    /**
     * Factory 等での生成時に gift or lot を追加する用メソッド
     */
    public function addGift($gift)
    {
        // TODO
    }

    /**
     * @override
     */
    protected function doProvide()
    {
        return array_rand($this->gifts);
    }
}