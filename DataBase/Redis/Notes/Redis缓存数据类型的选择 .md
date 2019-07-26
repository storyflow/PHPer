#### Redis缓存数据类型的选择?  

1. Strings 数据结构是简单的key-value类型，value其实不仅是String，也可以是数字.  
2. Hash:序列化数据，key-value快速查找，官方建议能用hash就用hash
   在Memcached中，我们经常将一些结构化的信息打包成HashMap，在客户端序列化后存储为一个字符串的值，比如用户的昵称、年龄、性别、积分等，这时候在需要修改其中某一项时，通常需要将所有值取出反序列化后，修改某一项的值，再序列化存储回去。这样不仅增大了开销，也不适用于一些可能并发操作的场合（比如两个并发的操作都需要修改积分）。而Redis的Hash结构可以使你像在数据库中Update一个属性一样只修改某一项属性值。
3. Lists：双向链表/消息队列
4. Set: 类似Lists，可做去重

![这里写图片描述](https://img-blog.csdn.net/2018081315550862?watermark/2/text/aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L1RpbWU4ODg=/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70)