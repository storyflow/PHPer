一、概述  
  字符串类型是Redis中最为基础的数据存储类型,它在Redis中是二进制安全的,这便意味着该类型可以接受任何格式的数据,如JPEG图像数据或Json对象描述信息等。在Redis中字符串类型的Value最多可以容纳的数据长度是512M。

二、相关命令列表

|命令原型|复杂度|  命令描述  |  返回值| 特殊说明|
|-----| ---| -----| -----|-----|
|GET key|O(1)|返回 key 所关联的字符串值| key 的值| 当 key 不存在时,返回 nil。如果 key 不是字符串类型,那么返回一个错误。|
|SET key value|O(1)|将字符串值 value 关联到 key 。|成功返回OK|SET会覆写旧值, 2.6.12版本之前,都返回OK|
|APPEND key value|O(1)| 将value 追加到 key 原来的值的末尾|key的长度。|key不存在,相当于执行 SET key value |
|STRLEN key|O(1)|返回 key 所储存的字符串值的长度|字符串值的长度|当 key 不存在时,返回 0 |
|DECR key|O(1)|将 key 中储存的数字值减一|key的值|key不存在,会被初始化为 0|
|INCR key|O(1)|将 key 中储存的数字值增一|key的值|key不存在,会被初始化为 0|
|DECRBY key decrement|O(1)|将 key 所储存的值减去减量 decrement |key的值|key不存在,会被初始化为0,错误的类型会报错|
|INCRBY key increment|O(1)|将 key 所储存的值加上增量 increment |key的值|key不存在,会被初始化为0,错误的类型会报错|
|INCRBYFLOAT key increment|O(1)|为 key 中所储存的值加上浮点数增量 increment|key的值|key不存在,会被初始化为0,错误的类型会报错|
|SETEX key seconds value|O(1)|将值value关联到key,并将 key的生存时间设为seconds(秒)|设置成功时返回 OK 。|当 seconds 参数不合法时,返回一个错误。|
|PSETEX key milliseconds value|O(1)|将值value关联到key,并将 key的生存时间设为milliseconds(毫秒)|设置成功时返回 OK 。|当 milliseconds 参数不合法时,返回一个错误。|
|SETNX key value|O(1)|key 不存在时,将 key 的值设为 value|成功返回1,失败返回0| key 已经存在,不处理|
|GETRANGE|O(N)|获取部分字符串|截取得出的子字符串。| key 不存在时,返回 0 |
|SETRANGE|O(M)|覆盖部分字符串的值|字符串的长度| M 为 value 参数的长度
|GETSET key value|O(1)|将给定 key 的值设为value,并返回 key 的旧值|返回给定 key 的旧值|可以同时完成获取和重置操作|
|MGET key [key ...]|O(N)|返回所有(一个或多个)给定 key 的值|一个包含所有给定 key 的值的列表|当 key 不存在时,返回 nil。|
|MSET key value [key value ...]|O(N)|同时设置一个或多个键值对|OK|无|
|GETBIT key offset|O(1)|获取指定偏移量上的值|字符串值指定偏移量上的值|当 offset 比字符串值的长度大,或者 key 不存在时,返回 0|
|SETBIT key offset value|O(1)|设置或清除指定偏移量上的值|指定偏移量原来储存的值|当字符串值进行伸展时,空白位置以 0 填充|
|BITCOUNT key [start] [end]|O(N)|计算给定字符串中,被设置为 1 的比特位的数量。|被设置为 1 的值的数量|不存在的 key 被当成是空字符串来处理,  start和end支持负数|
|BITOP operation destkey key [key ...]|O(N)|对一个或多个保存二进制位的字符串 key进行位元操作,结果保存到destkey。|destkey的长度|除了 NOT 操作之外,其他操作都可以接受一个或多个 key 作为输入。|


三、命令示例  

1. SET/GET/APPEND/STRLEN:
```
/> redis-cli   #执行Redis客户端工具。
redis 127.0.0.1:6379> exists mykey                   #判断该键是否存在,存在返回1,否则返回0。
(integer) 0
redis 127.0.0.1:6379> append mykey "hello"      #该键并不存在,因此append命令返回当前Value的长度。
(integer) 5
redis 127.0.0.1:6379> append mykey " world"    #该键已经存在,因此返回追加后Value的长度。
(integer) 11
redis 127.0.0.1:6379> get mykey                      #通过get命令获取该键,以判断append的结果。
"hello world"
redis 127.0.0.1:6379> set mykey "this is a test" #通过set命令为键设置新值,并覆盖原有值。
OK
redis 127.0.0.1:6379> get mykey
"this is a test"
redis 127.0.0.1:6379> strlen mykey                  #获取指定Key的字符长度,等效于C库中strlen函数。
(integer) 14
```

2. INCR/DECR/INCRBY/DECRBY:
```
redis 127.0.0.1:6379> set mykey 20     #设置Key的值为20
OK
redis 127.0.0.1:6379> incr mykey         #该Key的值递增1
(integer) 21
redis 127.0.0.1:6379> decr mykey        #该Key的值递减1
(integer) 20
redis 127.0.0.1:6379> del mykey          #删除已有键。
(integer) 1
redis 127.0.0.1:6379> decr mykey        #对空值执行递减操作,其原值被设定为0,递减后的值为-1
(integer) -1
redis 127.0.0.1:6379> del mykey   
(integer) 1
redis 127.0.0.1:6379> incr mykey        #对空值执行递增操作,其原值被设定为0,递增后的值为1
(integer) 1
redis 127.0.0.1:6379> set mykey hello #将该键的Value设置为不能转换为整型的普通字符串。
OK
redis 127.0.0.1:6379> incr mykey        #在该键上再次执行递增操作时,Redis将报告错误信息。
(error) ERR value is not an integer or out of range
redis 127.0.0.1:6379> set mykey 10
OK
redis 127.0.0.1:6379> decrby mykey 5 
(integer) 5
redis 127.0.0.1:6379> incrby mykey 10
(integer) 15
```

3. GETSET：
```
redis 127.0.0.1:6379> incr mycounter      #将计数器的值原子性的递增1
(integer) 1
#在获取计数器原有值的同时,并将其设置为新值,这两个操作原子性的同时完成。
redis 127.0.0.1:6379> getset mycounter 0  
"1"
redis 127.0.0.1:6379> get mycounter       #查看设置后的结果。
"0"
```        
4. SETEX:
```
redis 127.0.0.1:6379> setex mykey 10 "hello"   #设置指定Key的过期时间为10秒。
OK    
#通过ttl命令查看一下指定Key的剩余存活时间(秒数),0表示已经过期,-1表示永不过期。
redis 127.0.0.1:6379> ttl mykey                       
(integer) 4
redis 127.0.0.1:6379> get mykey                      #在该键的存活期内我们仍然可以获取到它的Value。
"hello"
redis 127.0.0.1:6379> ttl mykey                        #该ttl命令的返回值显示,该Key已经过期。
(integer) 0
redis 127.0.0.1:6379> get mykey                      #获取已过期的Key将返回nil。
(nil)
```
5. SETNX:
```
redis 127.0.0.1:6379> del mykey                      #删除该键,以便于下面的测试验证。
(integer) 1
redis 127.0.0.1:6379> setnx mykey "hello"        #该键并不存在,因此该命令执行成功。
(integer) 1
redis 127.0.0.1:6379> setnx mykey "world"       #该键已经存在,因此本次设置没有产生任何效果。
(integer) 0
redis 127.0.0.1:6379> get mykey                      #从结果可以看出,返回的值仍为第一次设置的值。
"hello"
```
6. SETRANGE/GETRANGE:
```
redis 127.0.0.1:6379> set mykey "hello world"       #设定初始值。
OK
redis 127.0.0.1:6379> setrange mykey 6 dd          #从第六个字节开始替换2个字节(dd只有2个字节)
(integer) 11
redis 127.0.0.1:6379> get mykey                         #查看替换后的值。
"hello ddrld"
redis 127.0.0.1:6379> setrange mykey 20 dd        #offset已经超过该Key原有值的长度了,该命令将会在末尾补0。
(integer) 22
redis 127.0.0.1:6379> get mykey                           #查看补0后替换的结果。
"hello ddrld\x00\x00\x00\x00\x00\x00\x00\x00\x00dd"
redis 127.0.0.1:6379> del mykey                         #删除该Key。
(integer) 1
redis 127.0.0.1:6379> setrange mykey 2 dd         #替换空值。
(integer) 4
redis 127.0.0.1:6379> get mykey                        #查看替换空值后的结果。
"\x00\x00dd"   
redis 127.0.0.1:6379> set mykey "0123456789"   #设置新值。
OK
redis 127.0.0.1:6379> getrange mykey 1 2      #截取该键的Value,从第一个字节开始,到第二个字节结束。
"12"
redis 127.0.0.1:6379> getrange mykey 1 20   #20已经超过Value的总长度,因此将截取第一个字节后面的所有字节。
"123456789"
```
7. SETBIT/GETBIT:
```
redis 127.0.0.1:6379> del mykey
(integer) 1
redis 127.0.0.1:6379> setbit mykey 7 1       #设置从0开始计算的第七位BIT值为1,返回原有BIT值0
(integer) 0
redis 127.0.0.1:6379> get mykey                #获取设置的结果,二进制的0000 0001的十六进制值为0x01
"\x01"
redis 127.0.0.1:6379> setbit mykey 6 1       #设置从0开始计算的第六位BIT值为1,返回原有BIT值0
(integer) 0
redis 127.0.0.1:6379> get mykey                #获取设置的结果,二进制的0000 0011的十六进制值为0x03
"\x03"
redis 127.0.0.1:6379> getbit mykey 6          #返回了指定Offset的BIT值。
(integer) 1
redis 127.0.0.1:6379> getbit mykey 10        #Offset已经超出了value的长度,因此返回0。
(integer) 0
```
8. MSET/MGET/MSETNX:
```
redis 127.0.0.1:6379> mset key1 "hello" key2 "world"   #批量设置了key1和key2两个键。
OK
redis 127.0.0.1:6379> mget key1 key2                        #批量获取了key1和key2两个键的值。
1) "hello"
2) "world"
#批量设置了key3和key4两个键,因为之前他们并不存在,所以该命令执行成功并返回1。
redis 127.0.0.1:6379> msetnx key3 "stephen" key4 "liu" 
(integer) 1
redis 127.0.0.1:6379> mget key3 key4                   
1) "stephen"
2) "liu"
#批量设置了key3和key5两个键,但是key3已经存在,所以该命令执行失败并返回0。
redis 127.0.0.1:6379> msetnx key3 "hello" key5 "world" 
(integer) 0
#批量获取key3和key5,由于key5没有设置成功,所以返回nil。
redis 127.0.0.1:6379> mget key3 key5                   
1) "stephen"
2) (nil)
```