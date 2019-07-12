## 简介
　　Kafka是一种分布式的，基于发布/订阅的消息系统。主要设计目标如下：

- 以时间复杂度为O(1)的方式提供消息持久化能力，即使对TB级以上数据也能保证常数时间的访问性能
- 高吞吐率。即使在非常廉价的商用机器上也能做到单机支持每秒100K条消息的传输
- 支持Kafka Server间的消息分区，及分布式消费，同时保证每个partition内的消息顺序传输
- 同时支持离线数据处理和实时数据处理

## 为什么要用消息系统
#### 解耦
在项目启动之初来预测将来项目会碰到什么需求，是极其困难的。消息队列在处理过程中间插入了一个隐含的、基于数据的接口层，两边的处理过程都要实现这一接口。这允许你独立的扩展或修改两边的处理过程，只要确保它们遵守同样的接口约束

#### 冗余
有些情况下，处理数据的过程会失败。除非数据被持久化，否则将造成丢失。消息队列把数据进行持久化直到它们已经被完全处理，通过这一方式规避了数据丢失风险。在被许多消息队列所采用的”插入-获取-删除”范式中，在把一个消息从队列中删除之前，需要你的处理过程明确的指出该消息已经被处理完毕，确保你的数据被安全的保存直到你使用完毕。

#### 扩展性
因为消息队列解耦了你的处理过程，所以增大消息入队和处理的频率是很容易的；只要另外增加处理过程即可。不需要改变代码、不需要调节参数。扩展就像调大电力按钮一样简单。

#### 灵活性 & 峰值处理能力
在访问量剧增的情况下，应用仍然需要继续发挥作用，但是这样的突发流量并不常见；如果为以能处理这类峰值访问为标准来投入资源随时待命无疑是巨大的浪费。使用消息队列能够使关键组件顶住突发的访问压力，而不会因为突发的超负荷的请求而完全崩溃。

#### 可恢复性
当体系的一部分组件失效，不会影响到整个系统。消息队列降低了进程间的耦合度，所以即使一个处理消息的进程挂掉，加入队列中的消息仍然可以在系统恢复后被处理。而这种允许重试或者延后处理请求的能力通常是造就一个略感不便的用户和一个沮丧透顶的用户之间的区别。

#### 送达保证
消息队列提供的冗余机制保证了消息能被实际的处理，只要一个进程读取了该队列即可。在此基础上，部分消息系统提供了一个”只送达一次”保证。无论有多少进程在从队列中领取数据，每一个消息只能被处理一次。这之所以成为可能，是因为获取一个消息只是”预定”了这个消息，暂时把它移出了队列。除非客户端明确的表示已经处理完了这个消息，否则这个消息会被放回队列中去，在一段可配置的时间之后可再次被处理。

#### 顺序保证
在大多使用场景下，数据处理的顺序都很重要。消息队列本来就是排序的，并且能保证数据会按照特定的顺序来处理。部分消息系统保证消息通过FIFO（先进先出）的顺序来处理，因此消息在队列中的位置就是从队列中检索他们的位置。

#### 缓冲
在任何重要的系统中，都会有需要不同的处理时间的元素。例如,加载一张图片比应用过滤器花费更少的时间。消息队列通过一个缓冲层来帮助任务最高效率的执行–写入队列的处理会尽可能的快速，而不受从队列读的预备处理的约束。该缓冲有助于控制和优化数据流经过系统的速度。

#### 理解数据流
在一个分布式系统里，要得到一个关于用户操作会用多长时间及其原因的总体印象，是个巨大的挑战。消息队列通过消息被处理的频率，来方便的辅助确定那些表现不佳的处理过程或领域，这些地方的数据流都不够优化。

#### 异步通信
很多时候，你不想也不需要立即处理消息。消息队列提供了异步处理机制，允许你把一个消息放入队列，但并不立即处理它。你想向队列中放入多少消息就放多少，然后在你乐意的时候再去处理它们。

## 概念
- Broker  
Kafka集群包含一个或多个服务器，这种服务器被称为broker
- Topic  
每条发布到Kafka集群的消息都有一个类别，这个类别被称为topic。（物理上不同topic的消息分开存储，逻辑上一个topic的消息虽然保存于一个或多个broker上但用户只需指定消息的topic即可生产或消费数据而不必关心数据存于何处）
- Partition  
parition是物理上的概念，每个topic包含一个或多个partition，创建topic时可指定parition数量。每个partition对应于一个文件夹，该文件夹下存储该partition的数据和索引文件
- Producer  
负责发布消息到Kafka broker
- Consumer  
消费消息。每个consumer属于一个特定的consumer group（可为每个consumer指定group name，若不指定group name则属于默认的group）。使用consumer high level API时，同一topic的一条消息只能被同一个consumer group内的一个consumer消费，但多个consumer group可同时消费这一消息。

## 原理

### 架构
![](https://images-cdn.shimo.im/p156zPvdedQTq15l__thumbnail?e=1550042298&token=FYM7KChSxT-8Gcpg_aWrJfeQJeszI30W9RGXKyHO:zdEBT1MmCsZFfJWn1WQTAeP6BH0=)

如上图所示，一个典型的kafka集群中包含若干producer（可以是web前端产生的page view，或者是服务器日志，系统CPU、memory等），若干broker（Kafka支持水平扩展，一般broker数量越多，集群吞吐率越高），若干consumer group，以及一个Zookeeper集群。Kafka通过Zookeeper管理集群配置，选举leader，以及在consumer group发生变化时进行rebalance。producer使用push模式将消息发布到broker，consumer使用pull模式从broker订阅并消费消息。 

### Push vs. Pull
　　作为一个messaging system，Kafka遵循了传统的方式，选择由producer向broker push消息并由consumer从broker pull消息。一些logging-centric system，比如Facebook的Scribe和Cloudera的Flume,采用非常不同的push模式。事实上，push模式和pull模式各有优劣。
　　push模式很难适应消费速率不同的消费者，因为消息发送速率是由broker决定的。push模式的目标是尽可能以最快速度传递消息，但是这样很容易造成consumer来不及处理消息，典型的表现就是拒绝服务以及网络拥塞。而pull模式则可以根据consumer的消费能力以适当的速率消费消息。

### Topic & Partition
　Topic在逻辑上可以被认为是一个queue。每条消费都必须指定它的topic，可以简单理解为必须指明把这条消息放进哪个queue里。为了使得Kafka的吞吐率可以水平扩展，物理上把topic分成一个或多个partition，每个partition在物理上对应一个文件夹，该文件夹下存储这个partition的所有消息和索引文件。

因为每条消息都被append到该partition中，是顺序写磁盘，因此效率非常高（经验证，顺序写磁盘效率比随机写内存还要高，这是Kafka高吞吐率的一个很重要的保证）。

![](https://user-gold-cdn.xitu.io/2018/7/26/164d6adfd44362ea?imageView2/0/w/1280/h/960/format/webp/ignore-error/1)

> 1.如果没有Key值则进行轮询发送。  
2.如果有Key值，对Key值进行Hash，然后对分区数量取余，保证了同一个Key值的会被路由到同一个分区，如果想队列的强顺序一致性，可以让所有的消息都设置为同一个Key。

对于传统的message queue而言，一般会删除已经被消费的消息，而Kafka集群会保留所有的消息，无论其被消费与否。当然，因为磁盘限制，不可能永久保留所有数据（实际上也没必要），因此Kafka提供两种策略去删除旧数据。一是基于时间，二是基于partition文件大小。例如可以通过配置$KAFKA_HOME/config/server.properties，让Kafka删除一周前的数据，也可通过配置让Kafka在partition文件超过1GB时删除旧数据。

这里要注意，因为Kafka读取特定消息的时间复杂度为O(1)，即与文件大小无关，所以这里删除文件与Kafka性能无关，选择怎样的删除策略只与磁盘以及具体的需求有关。另外，Kafka会为每一个consumer group保留一些metadata信息–当前消费的消息的position，也即offset。这个offset由consumer控制。正常情况下consumer会在消费完一条消息后线性增加这个offset。当然，consumer也可将offset设成一个较小的值，重新消费一些消息。因为offet由consumer控制，所以Kafka broker是无状态的，它不需要标记哪些消息被哪些consumer过，不需要通过broker去保证同一个consumer group只有一个consumer能消费某一条消息，因此也就不需要锁机制，这也为Kafka的高吞吐率提供了有力保障。

### Replication & Leader election
　　Kafka从0.8开始提供partition级别的replication，replication的数量可在$KAFKA_HOME/config/server.properties中配置。
```
default.replication.factor = 1
```
该 Replication与leader election配合提供了自动的failover机制。replication对Kafka的吞吐率是有一定影响的，但极大的增强了可用性。默认情况下，Kafka的replication数量为1。　　每个partition都有一个唯一的leader，所有的读写操作都在leader上完成，leader批量从leader上pull数据。一般情况下partition的数量大于等于broker的数量，并且所有partition的leader均匀分布在broker上。follower上的日志和其leader上的完全一样。
　　和大部分分布式系统一样，Kakfa处理失败需要明确定义一个broker是否alive。对于Kafka而言，Kafka存活包含两个条件，一是它必须维护与Zookeeper的session(这个通过Zookeeper的heartbeat机制来实现)。二是follower必须能够及时将leader的writing复制过来，不能“落后太多”。
　　leader会track“in sync”的node list。如果一个follower宕机，或者落后太多，leader将把它从”in sync” list中移除。这里所描述的“落后太多”指follower复制的消息落后于leader后的条数超过预定值，该值可在$KAFKA_HOME/config/server.properties中配置
```
#If a replica falls more than this many messages behind the leader, the leader will remove the follower from ISR and treat it as dead  
replica.lag.max.messages=4000

#If a follower hasn't sent any fetch requests for this window of time, the leader will remove the follower from ISR (in-sync replicas) and treat it as dead
replica.lag.time.max.ms=10000
```
　　需要说明的是，Kafka只解决”fail/recover”，不处理“Byzantine”（“拜占庭”）问题。
　　一条消息只有被“in sync” list里的所有follower都从leader复制过去才会被认为已提交。这样就避免了部分数据被写进了leader，还没来得及被任何follower复制就宕机了，而造成数据丢失（consumer无法消费这些数据）。而对于producer而言，它可以选择是否等待消息commit，这可以通过request.required.acks来设置。这种机制确保了只要“in sync” list有一个或以上的flollower，一条被commit的消息就不会丢失。

　　这里的复制机制即不是同步复制，也不是单纯的异步复制。事实上，同步复制要求“活着的”follower都复制完，这条消息才会被认为commit，这种复制方式极大的影响了吞吐率（高吞吐率是Kafka非常重要的一个特性）。而异步复制方式下，follower异步的从leader复制数据，数据只要被leader写入log就被认为已经commit，这种情况下如果follwer都落后于leader，而leader突然宕机，则会丢失数据。而Kafka的这种使用“in sync” list的方式则很好的均衡了确保数据不丢失以及吞吐率。follower可以批量的从leader复制数据，这样极大的提高复制性能（批量写磁盘），极大减少了follower与leader的差距（前文有说到，只要follower落后leader不太远，则被认为在“in sync” list里）。  
　　
　　上文说明了Kafka是如何做replication的，另外一个很重要的问题是当leader宕机了，怎样在follower中选举出新的leader。因为follower可能落后许多或者crash了，所以必须确保选择“最新”的follower作为新的leader。一个基本的原则就是，如果leader不在了，新的leader必须拥有原来的leader commit的所有消息。这就需要作一个折衷，如果leader在标明一条消息被commit前等待更多的follower确认，那在它die之后就有更多的follower可以作为新的leader，但这也会造成吞吐率的下降。  
　　一种非常常用的选举leader的方式是“majority vote”（“少数服从多数”），但Kafka并未采用这种方式。这种模式下，如果我们有2f+1个replica（包含leader和follower），那在commit之前必须保证有f+1个replica复制完消息，为了保证正确选出新的leader，fail的replica不能超过f个。因为在剩下的任意f+1个replica里，至少有一个replica包含有最新的所有消息。这种方式有个很大的优势，系统的latency只取决于最快的几台server，也就是说，如果replication factor是3，那latency就取决于最快的那个follower而非最慢那个。majority vote也有一些劣势，为了保证leader election的正常进行，它所能容忍的fail的follower个数比较少。如果要容忍1个follower挂掉，必须要有3个以上的replica，如果要容忍2个follower挂掉，必须要有5个以上的replica。也就是说，在生产环境下为了保证较高的容错程度，必须要有大量的replica，而大量的replica又会在大数据量下导致性能的急剧下降。这就是这种算法更多用在Zookeeper这种共享集群配置的系统中而很少在需要存储大量数据的系统中使用的原因。例如HDFS的HA feature是基于majority-vote-based journal，但是它的数据存储并没有使用这种expensive的方式。  
　　实际上，leader election算法非常多，比如Zookeper的Zab, Raft和Viewstamped Replication。而Kafka所使用的leader election算法更像微软的PacificA算法。  
　　Kafka在Zookeeper中动态维护了一个ISR（in-sync replicas） set，这个set里的所有replica都跟上了leader，只有ISR里的成员才有被选为leader的可能。在这种模式下，对于f+1个replica，一个Kafka topic能在保证不丢失已经ommit的消息的前提下容忍f个replica的失败。在大多数使用场景中，这种模式是非常有利的。事实上，为了容忍f个replica的失败，majority vote和ISR在commit前需要等待的replica数量是一样的，但是ISR需要的总的replica的个数几乎是majority vote的一半。  
　　虽然majority vote与ISR相比有不需等待最慢的server这一优势，但是Kafka作者认为Kafka可以通过producer选择是否被commit阻塞来改善这一问题，并且节省下来的replica和磁盘使得ISR模式仍然值得。


## 参考
1. [Kafka深度解析](http://www.jasongj.com/2015/01/02/Kafka%E6%B7%B1%E5%BA%A6%E8%A7%A3%E6%9E%90/)
2. [使用消息队列的 10 个理由](https://www.oschina.net/translate/top-10-uses-for-message-queue)