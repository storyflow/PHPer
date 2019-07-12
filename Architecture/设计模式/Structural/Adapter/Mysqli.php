<?php

namespace Structural\Adapter;;

class Mysqli implements DBInterface
{
    private $link = null;

    public function connect($host, $user, $pwd, $db)
    {
        echo "Mysqli连接" . PHP_EOL;
        $link = mysqli_connect($host, $user, $pwd, $db);
        if (!$link)
            throw new \Exception('Mysqli server connect error!');
        $this->link = $link;
    }

    public function query($sql)
    {
        echo "Mysqli查询" . PHP_EOL;
        if (!$this->link)
            throw new \Exception('Mysqli server gone away!');

        $data = [];
        $result = mysqli_query($this->link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] =$row;
        }
        return $data;
    }

    public function close()
    {
        echo "Mysqli关闭连接" . PHP_EOL;
        var_dump($this->link);
        mysqli_close($this->link);
    }

}