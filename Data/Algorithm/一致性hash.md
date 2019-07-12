# 一致性hash

## 定义
一致哈希是一种特殊的哈希算法。在使用一致哈希算法后，哈希表槽位数（大小）的改变平均只需要对 K/n个关键字重新映射，其中K是关键字的数量， n是槽位数量。然而在传统的哈希表中，添加或删除一个槽位的几乎需要对所有关键字进行重新映射。

## 目的
当slot数发生变化时，能够尽量少的移动数据。

## 普通hash的问题
如果有100个item，当增加一个node，之前99%的数据都需要重新移动。
当node数发生变化时，如何保证尽量少引起迁移呢？即当增加或者删除节点时，对于大多数item，保证原来分配到的某个node，现在仍然应该分配到那个node，将数据迁移量的降到最低。

## 一致性hash算法
![](https://cloud.githubusercontent.com/assets/1736354/16341426/8c9e6caa-3a5f-11e6-87ad-fdb462b76aef.png)

## 改进-虚节点
当我们将node进行哈希后，这些值并没有均匀地落在环上，因此，最终会导致，这些节点所管辖的范围并不均匀，最终导致了数据分布的不均匀。
![](https://cloud.githubusercontent.com/assets/1736354/16341445/a0e32fde-3a5f-11e6-969d-085f64220e63.png)

## 一致性哈希算法的PHP实现
```
interface ConsistentHash
{
    //将字符串转为hash值
    public function cHash($str);

    //添加一台服务器到服务器列表中
    public function addServer($server);

    //从服务器删除一台服务器
    public function removeServer($server);

    //在当前的服务器列表中找到合适的服务器存放数据
    public function lookup($key);
}

/**
 * 具体一致性哈希实现
 * author chenqionghe
 * Class MyConsistentHash
 */
class MyConsistentHash implements ConsistentHash
{
    public $serverList = array(); //服务器列列表
    public $virtualPos = array(); //虚拟节点的位置
    public $virtualPosNum = 5;  //每个节点对应5个虚节点

    /**
     * 将字符串转换成32位无符号整数hash值
     *
     * @param string $str 字符串
     *
     * @return int
     */
    public function cHash($str)
    {
        $str = md5($str);

        return sprintf('%u', crc32($str));
    }

    /**
     * 在当前的服务器列表中找到合适的服务器存放数据
     *
     * @param string $key 键名
     *
     * @return mixed 返回服务器IP地址
     */
    public function lookup($key)
    {
        $point = $this->cHash($key);//落点的hash值
        $finalServer = current($this->virtualPos);//先取圆环上最小的一个节点当成结果
        foreach ($this->virtualPos as $pos => $server) {
            if ($point <= $pos) {
                $finalServer = $server;
                break;
            }
        }

        reset($this->virtualPos);//重置圆环的指针为第一个

        return $finalServer;
    }

    /**
     * 添加一台服务器到服务器列表中
     *
     * @param string $server 服务器IP地址
     *
     * @return bool
     */
    public function addServer($server)
    {
        if (!isset($this->serverList[$server])) {
            for ($i = 0; $i < $this->virtualPosNum; $i ++) {
                $pos = $this->cHash($server . '-' . $i);
                $this->virtualPos[$pos] = $server;
                $this->serverList[$server][] = $pos;
            }
            ksort($this->virtualPos, SORT_NUMERIC);
        }
        echo "增加服务器{$server}\n";

        return true;
    }

    /**
     * 移除一台服务器（循环所有的虚节点，删除值为该服务器地址的虚节点）
     *
     * @param string $server 服务器IP地址
     *
     * @return bool
     */
    public function removeServer($server)
    {
        if (isset($this->serverList[$server])) {
            //删除对应虚节点
            foreach ($this->serverList[$server] as $pos) {
                unset($this->virtualPos[$pos]);
            }
            //删除对应服务器
            unset($this->serverList[$server]);
        }
        echo "移除服务器{$server}\n";

        return true;
    }
}

$hashServer = new MyConsistentHash();
foreach (range(1, 10) as $server) {
    $hashServer->addServer("192.168.1.{$server}");
}
foreach (range(1, 10) as $key) {
    echo "保存 key{$key} 到 server :" . $hashServer->lookup("key{$key}") . "\n";
}
foreach (range(11, 20) as $server) {
    $hashServer->addServer("192.168.1.{$server}");
}
foreach (range(11, 20) as $key) {
    echo "保存 key{$key} 到 server :" . $hashServer->lookup("key{$key}") . "\n";
}
```

## 参考资料
* [一致性哈希算法的理解与实践](https://yikun.github.io/2016/06/09/%E4%B8%80%E8%87%B4%E6%80%A7%E5%93%88%E5%B8%8C%E7%AE%97%E6%B3%95%E7%9A%84%E7%90%86%E8%A7%A3%E4%B8%8E%E5%AE%9E%E8%B7%B5/)
* [一致性哈希算法的PHP实现](https://www.cnblogs.com/chenqionghe/p/4775528.html)