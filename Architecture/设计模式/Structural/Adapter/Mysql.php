<?php

namespace Structural\Adapter;;

class Mysql implements DBInterface
{
    private $link = null;

    public function connect($host, $user, $pwd, $db)
    {
        echo "Mysql连接" . PHP_EOL;
        $link = mysql_connect($host, $user, $pwd);
        if (!$link)
            throw new \Exception('Mysql server connect error!');
        mysql_select_db($db, $link);
        $this->link = $link;
    }

    public function query($sql)
    {
        echo "Mysql查询" . PHP_EOL;
        if (!$this->link)
            throw new \Exception('Mysql server gone away!');

        $data = [];
        $result = mysql_query($sql, $this->link);
        while ($row = mysql_fetch_assoc($result)) {
            $data[] =$row;
        }
        return $data;
    }

    public function close()
    {
        echo "Mysql关闭连接" . PHP_EOL;
        var_dump($this->link);
        mysql_close($this->link);
    }

}