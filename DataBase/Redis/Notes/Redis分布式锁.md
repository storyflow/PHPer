## **使用过Redis分布式锁么，它是什么回事？**

先拿setnx来争抢锁，抢到之后，再用expire给锁加一个过期时间防止锁忘记了释放。

#### 如果在setnx之后执行expire之前进程意外crash或者要重启维护了，那会怎么样？

set指令有参数，同时把setnx和expire合成一条指令来用的

```
$this->redis->set($redisKey, ['nx', 'ex' => 3]);
```

先拿setnx来争抢锁，抢到之后，再用expire给锁加一个过期时间防止锁忘记了释放。



## 问题

#### 有其他方式实现分布式锁吗？

