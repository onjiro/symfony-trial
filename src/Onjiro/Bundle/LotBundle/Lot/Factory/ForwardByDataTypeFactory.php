<?php
namespace Onjiro\Bundle\LotBundle\Lot\Factory;

/**
 * テーブルで定義された情報を基に適切な実装にLot生成処理を移譲するFactory.
 *
 * 以下により決定される実装に処理を移譲する
 *   - 渡されてたidを基にテーブルに定義された情報からtypeを取得
 *   - 前段で取得したtypeを基に移譲対象のインスタンスを取得
 */
class ForwardByDataTypeFactory implements LotFactoryInterface
{
    /**
     * @param array $factories array(<typeKey> => <factoryInstance> [, ...])
     */
    public function __construct(array $factories)
    {
        $this->factories = $factories;

        // TODO 本当はテーブルから持ってくる情報
        $this->tableInfo = [
          1 => 'normal',
          2 => 'rare',
          3 => 'rare',
          4 => 'event',
          5 => 'tutorial',
        ];
    }

    /**
     * @override
     */
    public function build($id)
    {
        if (!isset($this->tableInfo[$id])) throw new Exception('定義されていないID。id = "'.$id.'"');

        $type = $this->tableInfo[$id];
        if (!isset($this->factories[$type])) throw new Exception('定義されていないタイプ。type = "'.$type.'"');

        return $this->factories[$type]->build($id);
    }
}
