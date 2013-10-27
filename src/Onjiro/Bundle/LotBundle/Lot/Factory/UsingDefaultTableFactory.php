<?php
namespace Onjiro\Bundle\LotBundle\Lot\Factory;

use Onjiro\Bundle\LotBundle\Lot\RateAllocatedLot;
use Onjiro\Bundle\LotBundle\Lot\EquallyLot;

class UsingDefaultTableFactory implements LotFactoryInterface
{
    public function __construct()
    {
        // TODO 本当はテーブルから持ってくる情報
        $this->groups = [
          'group1' => [
            'rate' => '0.8',
            'gifts' => [0, 1, 2, 3, 4]
          ],
          'group2' => [
            'rate' => '0.15',
            'gifts' => [5, 6]
          ]
        ];
    }

    /**
     * @override
     */
    public function build($id)
    {
        return new RateAllocatedLot(array_map(function($group) {
            return [
              'rate' => intval(bcmul($group['rate'], 10000, 0)),
              'gift' => new EquallyLot($group['gifts']);
            ];
        }, $this->groups));
    }
}
