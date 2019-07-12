<?php

namespace Structural\Adapter;

interface DBInterface
{
    public function connect($host, $user, $pwd, $db);
    public function query($sql);
    public function close();
}