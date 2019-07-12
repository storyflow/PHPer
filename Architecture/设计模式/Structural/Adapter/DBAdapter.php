<?php

namespace Structural\Adapter;

class DBAdapter
{
    private $db_server = null;

    public function __construct($db_server = '')
    {
        switch ($db_server) {
            case 'mysql':
                $this->db_server = new Mysql();
                break;
            case 'mysqli':
                $this->db_server = new Mysqli();
                break;
            case 'pdo':
                $this->db_server = new Pdo();
                break;
            default:
                break;
        }
    }

    public function connect($host, $user, $pwd, $db)
    {
        if (!$this->db_server)
            throw new \Exception('no db server!');
        $this->db_server->connect($host, $user, $pwd, $db);
    }

    public function query($sql)
    {
        if (!$this->db_server)
            throw new \Exception('no db server!');
        return $this->db_server->query($sql);
    }

    public function close()
    {
        if (!$this->db_server)
            throw new \Exception('no db server!');
        $this->db_server->close();
    }
}