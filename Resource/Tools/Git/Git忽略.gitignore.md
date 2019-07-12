## 常用方案
使用.gitignore
## 如何忽略.gitignore
git update-index --skip-worktree .gitignore
## 如何恢复
git ls-files -v | grep -i ^S | cut -c 3- | tr '\012' '\000' | xargs -0 git update-index --no-skip-worktree

## 什么时候使用.git/info/exclude而不是.gitignore来排除文件？
.gitignore可用于存储库的所有克隆
.git/info/exclude仅适用于单个克隆，因此一个人在其克隆中忽略的内容在某些其他人的克隆中不可用。

