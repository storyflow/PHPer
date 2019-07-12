<?php

namespace Structural\Adapter;;

class Pdo implements DBInterface
{
    private $link = null;

    public function connect($host, $user, $pwd, $db)
    {
        echo "Pdo连接" . PHP_EOL;
        $link = new \PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        if (!$link)
            throw new \Exception('PDO server connect error!');
        $this->link = $link;
    }

    public function query($sql)
    {
        echo "Pdo关闭" . PHP_EOL;
        if (!$this->link)
            throw new \Exception('PDO server gone away!');
        $result = $this->link->query($sql);
        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result = $result->fetchAll();
        return $result;
    }

    public function close()
    {
        echo "Pdo关闭" . PHP_EOL;
        var_dump($this->link);
        unset($this->link);
    }

}