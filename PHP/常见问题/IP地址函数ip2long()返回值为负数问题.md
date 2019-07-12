ip2long — 将 IPV4 的字符串互联网协议转换成长整型数字

ip2long() 转出来的数值应该都是正整数, 但是在某些机器转出负数, 刚开始以为是 PHP 版本问题, 后来做些测试, 确定是系统版本 32bits 和 64bits 的问题.

```
32 bits ip2long(): -2147483648 ~ 214748364764  
64 bits ip2long(): 0 ~ 42949672945  
```
## 测试
```
ip2long() 于 32bits 的系统测试
ip2long(‘127.255.255.255’); // 2147483647 = 十进制的最大值
ip2long(‘255.255.255.255’); // -1
ip2long(‘255.255.255.254’); // -2
ip2long(‘192.168.1.2’); // -1062731518
```
```
ip2long() 于 64bits 的系统测试
ip2long(‘127.255.255.255’); // 2147483647 = 十进制的最大值
ip2long(‘255.255.255.255’); // 4294967295
ip2long(‘255.255.255.254’); // 4294967294
ip2long(‘192.168.1.2’); // 3232235778
```

## 解决办法
```
解法1 – 自己转换
<?php
function iptolong($ip)
{
    list($a, $b, $c, $d) = split('\.', $ip);
    return (($a * 256 + $b) * 256 + $c) * 256 + $d;
}
?>
```
```
解法2 – 转成二进制, 再转回十进制
<?php
// bindec 只吃 string, 回传 double
// decbin 会回传 string
echo bindec(decbin(ip2long('192.168.1.2'))); // 3232235778
?>
```
```
解法3 – 官方建议的解法 (推荐用此方法)
<?php
// 直接印值, 使用 printf("%u")
printf("%u", ip2long('192.168.1.2')); // 3232235778

// 回传值(于 function 或 echo 等), 使用 sprintf(“%u”)
echo sprintf(“%u”, ip2long(‘192.168.1.2’)); // 3232235778
?>
```

## ip2long实现
```
$ip = "157.23.56.90";
list($ip1, $ip2, $ip3, $ip4) = explode(".", $ip);
echo $ip1 * pow(256, 3) + $ip2 * pow(256, 2) + $ip3 * 256 + $ip4;
```
## long2ip实现
```
<?php
$ip_long = -1659422630;
$ip1 = ($ip_long >> 24) & 0xff; // 跟0xff做与运算的目的是取低8位
$ip2 = ($ip_long >> 16) & 0xff;
$ip3 = ($ip_long >> 8) & 0xff;
$ip4 = $ip_long & 0xff;
echo $ip1 . '.' . $ip2 . '.' . $ip3 . '.' . $ip4 . "\n";
```

## 其他情况
```
<?php
echo ip2long('058.99.11.1'); // null
echo ip2long('58.099.11.1'); // null
```