<?php
namespace Onjiro\Bundle\LotBundle\Lot;

abstract class LotBase implements LotInterface
{
    /**
     * 抽選の結果がLotだったらさらにそのLotから抽選する.
     *
     * 以下の様な構成にすることで既存のLotからランダムで抽選といったことが可能
     * EquallyLot
     *   RateAllocatedLot - 既存のLotを想定
     *     [gift, gift, ...]
     *   RateAllocatedLot - 既存のLotを想定
     *     [gift, gift, ...]
     */
    public function draw()
    {
        if (($gift = $this->doProvide()) instanceof LotInterface) {
            return $gift->draw();
        } else {
            return $gift;
        }
    }

    protected abstract doProvide();
}