## 操作过程说明

设置当前主节点为只读 【主节点操作】

redis [M] > config set min-slaves-to-write 10



\#. redis master节点不可写，由下面2个参数控制，任何一个为0，表示不启用此特性

\#. min-slaves-to-write N ，健康slave节点数量，默认值0

\#. min-slaves-max-lag M，lag(last ping) <= M秒，才认为是健康的，默认值是10

\#. 上面的命令代表 至少有10个lag <= 10秒的 从节点，主节点才可写入

检查主从同步状态 【主节点操作】

redis [M] > info replication



\#. 查看 slaveN:... offset=NNN 和 master_repl_offset=NNN

\#. 如果两个数值一致说明主从没有延迟

提升从节点为主节点 【在从节点(S1)操作】

redis [S1] > slaveof no one

修改其他从节点，指向新的主节点

redis [S2] > slaveof 10.1.1.11 6379



\#. 数据会进行全量同步

\#. SLAVEOF host port

\#. 如果M节点和S1节点密码不一样，需要 CONFIG set masterauth "S1.requirepass"

修改代码相关配置



## 操作完成后的一些操作

确认是否有代码缓存，影响配置生效时间

记得检查新主从的状态

记得下线原来的主节点

记得修改新主从配置文件里的信息