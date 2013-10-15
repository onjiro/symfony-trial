<?php

namespace Onjiro\Bundle\KakeiboBundle\Database;

use Symfony\Component\Debug\Exception\FatalErrorException;

class DatabaseConnectorBase
{
    private $table_name;
    private $id_column = 'id';

    public function __construct($table_name, $connection)
    {
        $this->table_name = $table_name;
        $this->connection = $connection;
    }

    public function find($id = null)
    {
        if ($id === null) {
            return $this->connection->fetchAll('select * from ${$this->table_name}');
        } else {
            return $this->connection->fetchArray('select * from ${$this->table_name} where ${id_column} = ?', array($id));
        }
    }

    public function __call($name, $args)
    {
        // TODO 安全性のため insert, update, delete だけに制限する？
        // 単純に__callを使用せずに移譲するだけのメソッドの方がよいか？
        if (method_exists($this->connection, $name)) {
            return call_user_func(array($this->connection, $name), $args);
        } else {
            trigger_error('Call to undefined method '.__CLASS__.'::'.$name.'()', E_USER_ERROR);
        }
    }

    protected function createQueryBuilder()
    {
        return $this->connection->createQueryBuilder();
    }
}