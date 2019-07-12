```
# 创建回收站路径
mkdir -p ~/.trash
```

```
# 打开bash配置
vim ~/.bashrc
```

```
# 修改rm命令 
alias rm=trash  
alias r=trash  
alias rl='ls ~/.trash'
alias ur=undelfile
undelfile()
{
  mv -i ~/.trash/$@ ./
}
trash()
{
  mv $@ ~/.trash/
}
```

```
# 清空回收站
cleartrash()
{
    echo -n "确定要删除吗?"
    read confirm
    [ $confirm == 'y' ] || [ $confirm == 'Y' ]  && /usr/bin/rm -rf ~/.trash/*
}
```
```
# 修改完
source ~/.bashrc
```
