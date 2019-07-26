# Git远程分支

### 问题：git branch -r 和 gitlab中分支不一样

原因：是因为git的策略导致，保留过时的远程分支。
解决方案：可以通过 git remote update --prune 可以清除所有过时的远程跟踪分支

