> 管理系统源代码目录名称为**web**

也可以clone TarsWeb文件夹

```
git clone https://github.com/TarsCloud/TarsWeb.git
```

修改配置文件，将配置文件中的ip地址修改为本机ip地址，如下：

```
cd ${安装目录}
sed -i 's/db.tars.com/${your_machine_ip}/g' config/webConf.js
sed -i 's/registry.tars.com/${your_machine_ip}/g' config/tars.conf
```

安装web管理页面依赖，启动web

```
cd ${安装目录}
npm install --registry=https://registry.npm.taobao.org
npm run prd
```

创建日志目录

```
mkdir -p /data/log/tars
```

访问站点 浏览器输入${your machine ip}:3000，即可看到