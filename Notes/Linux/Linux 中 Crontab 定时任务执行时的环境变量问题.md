## 现象

重新编译后，手动执行脚本能成功，但是crontab中脚本执行不成功

## 原因

**crontab** 有自己的环境变量配置，在 `/etc/crontab` 文件中，并不会自动加载当前用户的环境变量。所以在执行命令之前，应该先配置好环境变量。

所以在 **crontab** 用户下，执行命令前先载入环境变量，如下。

```
00 10 * * * source $HOME/.bash_profile && $HOME/path/to/script;sh /home/crawl/exec_aqi.sh &  > /dev/null 2>&1
```



可以修改 `/etc/crontab` 文件指定运行的用户和环境变量

```
SHELL=/bin/bash
PATH=/sbin:/bin:/usr/sbin:/usr/bin
MAILTO=root

# For details see man 4 crontabs

# Example of job definition:
# .---------------- minute (0 - 59)
# |  .------------- hour (0 - 23)
# |  |  .---------- day of month (1 - 31)
# |  |  |  .------- month (1 - 12) OR jan,feb,mar,apr ...
# |  |  |  |  .---- day of week (0 - 6) (Sunday=0 or 7) OR sun,mon,tue,wed,thu,fri,sat
# |  |  |  |  |
# *  *  *  *  * user-name  command to be executed
00 10 * * * crawl sh /home/crawl/exec_aqi.sh &
```

修改完之后，最好执行命令 `sudo service crond restart` 使立即生效。



## 扩展知识

#### cron在3个地方查找配置文件（设置shell脚本）：

1、/var/spool/cron/yanggang 这个目录下存放的是每个用户（包括root）的crontab任务，每个任务以创建者的名字命名，比如用户tom建的crontab任务对应的文件就是/var/spool/cron/tom

一般一个用户最多只有一个crontab文件（如：root, yanggang等），其对应日志在/var/spool/mail/root（或/var/spool/mail/yanggang）文件里

2、/etc/crontab 这个文件负责安排由系统管理员制定的维护系统以及其他任务的crontab。

3、/etc/cron.d/ 这个目录用来存放任何要执行的crontab文件或脚本。



#### 环境变量

/etc/crontab 及 /etc/cron.d/ ，都可以在/etc/crontab中定义环境变量

但是/var/spool/cron/xx的不可以的



## 参考资料

[Linux 中 Crontab 定时任务执行时的环境变量问题](https://zcdll.github.io/2018/01/30/own-crontab/)