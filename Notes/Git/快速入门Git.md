# 快速入门Git

## 一、账号环境
1. 使用自己的企业邮箱注册自己的账号
2. 安装环境
	windows为例：
	下载：https://git-scm.com/download/win
	git 配置 
	git config --global user.email ""
	git config --global user.name ""

## 二、加入开发组 
1. 申请加入开发者
2. 审核通过，并分配相应权限

## 三、导出项目代码
#### 本地无代码，从远程拉取

1. 操作
	git clone http://example.com/example/example.com.git example.com
2. 注意事项

- 一般使用https协议的，ssh的服务器不一定会开启
- 所有跟远程代码库交互，都需要输入git账号和密码

#### 本地有代码，关联到远程一个空代码库

1. 操作步骤
	进入代码目录：cd existing_git_repo
	增加远程仓库地址：git remote add origin git@172.16.0.245:example/demo.git
	推送到远程仓库： git push -u origin master


## 四、常规操作
```
# 本地仓库 查看当前git状态
$git status(svn st)

# 本地仓库 新增文件/文件改动存入缓存区
$ git add index.php

# 本地仓库 撤销add操作
$ git reset HEAD index.php

# 提交到本地仓库
$ git commit -m '说明' index.php

# 修改上一次提交的说明 
$ git commit --amend

# 本地仓库 查看文件改动
$ git diff index.php

# 改错，不想保持，舍弃工作目录中的更改
$ git checkout index.php

# 删除文件
$ git rm index.php

# 恢复删除的文件
$ git checkout HEAD index.php

# 查看文件提交日志
$ git log index.php

# 提交代码到远程仓库
$ git push -u origin master

# 从远程代码库拉取最新代码
$ git pull 

# 免去每次输账号密码
$ git config --global credential.helper store

```

#### 添加别名
```
vim ~/.gitconfig ，末尾添加 

[alias]
  a = add
  b = branch
  c = commit
  ci = commit
  d = diff
  st = status
  lg = log --graph --pretty=format:'%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr)%Creset | %C(bold)%an' --abbrev-commit --date=relative
  r = reset
  aa = add .
  ba = branch -a
  ca = commit -a
  cc = commit -a -m
  cl = clone
  cm = commit -m
  co = checkout
  cp = cherry-pick
  nb = checkout -b
  pl = pull
  ps = push origin master
```

## 五、分支操作

```
# 查看本地仓库分支及当前所在分支
$ git branch 

# 查看本地分支追踪的是哪一个远程分支
$ git branch -vv

# 创建分支
$ git branch dev

# 创建分支并切换到相应的分支
$ git checkout -b dev

# 切换分支
$ git checkout master

# 合并分支
$ git merge dev

# 拉取合并指定指定远程仓库的指定分支
git pull <remote> <branch>
```

## 六、远程仓库操作

```
# 添加远程仓库
$ git remote add origin master

# 查看远程仓库信息
$ git remote -v

        3、拉取远程仓库的信息
                git fetch <shortname> :也可以使用<url>，默认是origin
                ps：fetch只会拉取数据，但并不合并，pull是fetch之后会自动合并git merge
# 推送到远程仓库
$ git push origin master
```

## 七、有兴趣的可以看下
* [Git 工作流程](http://www.ruanyifeng.com/blog/2015/12/git-workflow.html)
* [代码回滚：Reset、Checkout、Revert 的选择](https://github.com/geeeeeeeeek/git-recipes/wiki/5.2-%E4%BB%A3%E7%A0%81%E5%9B%9E%E6%BB%9A%EF%BC%9AReset%E3%80%81Checkout%E3%80%81Revert-%E7%9A%84%E9%80%89%E6%8B%A9)