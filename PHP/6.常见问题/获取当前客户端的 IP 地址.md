```
REMOTE_ADDR
HTTP_X_FORWARDED_FOR

/**
 * 获取用户IP
 * @param array $allowProxys allowProxys
 * 
 * @return string
 */
function get_client_ip($allowProxys = array())
{
    if (getenv('REMOTE_ADDR'))
    {
        $onlineip = getenv('REMOTE_ADDR');
    }
    else
    {
        $onlineip = $_SERVER['REMOTE_ADDR'];
    }
    if (in_array($onlineip, $allowProxys))
    {
        if (getenv('HTTP_X_FORWARDED_FOR'))
        {
            $ips = getenv('HTTP_X_FORWARDED_FOR');
        }
        elseif ($_SERVER['HTTP_X_FORWARDED_FOR'])
        {
            $ips = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        if ($ips)
        {
            $ips = explode(",", $ips);
            $curIP = array_pop($ips);
            $onlineip = trim($curIP);
        }
    }
    if (filter_var($onlineip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
    {
        return $onlineip;
    }
    else
    {
        return '0.0.0.0';
    }
}

```

