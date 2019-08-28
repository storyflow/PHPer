https://learnku.com/docs/composer/2018/03-cli/2084



- --prefer-source: 有两种方式下载扩展包: `源代码版` 和 `可执行版` 。对于稳定版本，Composer 会默认使用 `可执行版` 。 `源码版` 来自版本控制工具的，如果启用了 `--prefer-source` ， Composer 会安装 `源码版` 。这有一个小提示，如果你想修复 bug ，那么从依赖关系中，直接本地克隆一个仓库。
- --prefer-dist: 和 `--prefer-source` 相反，如果 `可执行版本` 存在，Compser 会直接安装。这会加快服务器上构建速度同时不用更新 vendor 。你没有正确安装， git 克隆该扩展包也是一种方式。
- --dry-run: 如果想运行时指明不安装某一扩展包，你可以使用 `--dry-run` 。这会模拟该安装并提示会出现的问题。
- --dev: 安装 `require-dev` 中的扩展列表（默认执行）。
- --no-dev: 跳过 `require-dev` 中的扩展列表。. 自动加载中会跳过 `autoload-dev` 规则。
- --no-autoloader: 跳过自动加载。
- --no-scripts: 跳过 `composer.json` 中声明的脚本。
- --no-progress: 移除进度的展示，有的命令或脚本不处理退格字符，引起显示混乱。
- --no-suggest: 跳过扩展包建议。
- --optimize-autoloader (-o): 转换 PSR-0/4 autoloading 到 classmap 可以获得更快的加载支持。特别是在生产环境下建议这么做，但由于运行需要一些时间，因此并没有作为默认值。
- --classmap-authoritative (-a): 仅从 classmap 加载类。会附带启动 `--optimize-autoloader` 。
- --apcu-autoloader: 启用 APCu 来缓存所有类。
- --ignore-platform-reqs: 忽略 `php`, `hhvm`, `lib-*` 和 `ext-*` 要求并强制安装，就算本地环境不完全要求。平台配置选项可见 [`platform`](https://laravel-china.org/docs/composer/2018/06-config#platform) 。