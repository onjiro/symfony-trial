<?php
namespace Onjiro\Bundle\LotBundle\Lot\Factory;

use Onjiro\Bundle\LotBundle\Lot\RateAllocatedLot;
use Onjiro\Bundle\LotBundle\Lot\EquallyLot;

class FillRateWithDefaultTableFactory extends UsingDefaultTableFactory
{
    public function __construct($fillGift, $toFillRate)
    {
        $this->fillGift = $fillGift;
        $this->toFillRate = $toFillRate;
    }

    /**
     * @override
     */
    public function build($id)
    {
        $ratedLot = parent::build($id);
        $rate = $this->toFillRate - $ratedLot->calculateSumRate();
        $ratedLot->addGift($this->toFillRate, $rate);
        return $ratedLot;
    }
}
