## 示例代码

```
'' > proc.txt
'' > list.txt
ps -ef|grep 'docker'|awk -F 'keyword -c ' '{print $2}'  >> proc.txt

IFS=$'\n'
for line in `cat proc.txt`;
do
    newline=${line//\\/\\\\}
    echo "check ${newline}"
    PROCESS_NUM_ALL=$(ps -ef|grep -w ${newline}| grep -v 'grep' | wc -l)
    PROCESS_NUM=$(ps -ef|grep -w ${newline}| grep -v 'grep' | grep -v 'docker'| wc -l)
    echo "所有进程数: $PROCESS_NUM_ALL 有效进程: $PROCESS_NUM";
    if [ ${PROCESS_NUM} -eq "0" ];then
        ps -ef|grep "${newline}"| grep 'docker'|grep -v 'grep'|cut -c 9-15|xargs kill -9
        echo "kill ${newline}"
        echo "kill ${newline}" >> list.txt
        echo "进程不存在"
    else
        echo "进程正常"
    fi
done
```

## 遇到的问题

1. 变量名写错

```
正确 ${abc}
错误 {$abc}
```



2. 在grep \ 的时候，需要转义

   ```
   newline=${line//\\/\\\\}
   ```



3. 变量赋值，不需要单引号

```
PROCESS_NUM_ALL=$(ps -ef|grep -w ${newline}| grep -v 'grep' | wc -l)
PROCESS_NUM_ALL=$(ps -ef|grep -w '${newline}‘| grep -v 'grep' | wc -l)
```

