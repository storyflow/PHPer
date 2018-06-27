## 一、为什么要用？
1. 之前基本上用的是jQuery，jQuery基于<span data-type="color" style="color:rgb(79, 79, 79)"><span data-type="background" style="background-color:rgb(255, 255, 255)">DOM操作，</span></span><span data-type="color" style="color:rgb(51, 51, 51)"><span data-type="background" style="background-color:rgb(255, 255, 255)">MVVM的开发模式也使前端从原先的DOM操作中解放出来，我们不再需要在维护视图和数据的统一上花大量的时间，只需要关注于data的变化，代码变得更加容易维护。</span></span>
2. 组件：复用性高，容易维护，方便测试，高内聚，低耦。

## 二、什么是MVVM?



![bg2015020110.png | left | 552x420](https://cdn.yuque.com/yuque/0/2018/png/103176/1525846625786-82246360-effb-4a2c-afd1-8a97fecfb86b.png "")


双向绑定（data-binding）：View的变动，自动反映在 ViewModel，反之亦然。

## 三、原理
__数据劫持:__<span data-type="color" style="color:rgb(36, 41, 46)"><span data-type="background" style="background-color:rgb(255, 255, 255)"> </span></span>vue.js 则是采用数据劫持结合发布者-订阅者模式的方式，通过`Object.defineProperty()`<span data-type="color" style="color:rgb(36, 41, 46)"><span data-type="background" style="background-color:rgb(255, 255, 255)">来劫持各个属性的</span></span>`setter`<span data-type="color" style="color:rgb(36, 41, 46)"><span data-type="background" style="background-color:rgb(255, 255, 255)">，</span></span>`getter`<span data-type="color" style="color:rgb(36, 41, 46)"><span data-type="background" style="background-color:rgb(255, 255, 255)">，在数据变动时发布消息给订阅者，触发相应的监听回调。</span></span>



![image.png | left | 730x390](https://cdn.yuque.com/yuque/0/2018/png/103176/1525847691363-be00a668-39ec-4c11-b731-ccb28b54fb9c.png "")

用JavaScript实现 [https://github.com/DMQ/mvvm](https://github.com/DMQ/mvvm)

## 四、入门
#### 简介
<span data-type="color" style="color:rgb(52, 73, 94)"><span data-type="background" style="background-color:rgb(255, 255, 255)">Vue (读音 /vjuː/，类似于 </span></span>__view__<span data-type="color" style="color:rgb(52, 73, 94)"><span data-type="background" style="background-color:rgb(255, 255, 255)">) 是一套用于构建用户界面的</span></span>__渐进式框架__<span data-type="color" style="color:rgb(52, 73, 94)"><span data-type="background" style="background-color:rgb(255, 255, 255)">。与其它大型框架不同的是，Vue 被设计为可以自底向上逐层应用。Vue 的核心库只关注视图层，不仅易于上手，还便于与第三方库或既有项目整合。</span></span>
#### 官网
[https://cn.vuejs.org/v2/guide/installation.html](https://cn.vuejs.org/v2/guide/installation.html)
#### 直接引用

```
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
```

#### 安装
```bash
# 不推荐上来就直接用 vue-cli 构建项目，尤其是如果没有 Node/Webpack 基础。

# 使用淘宝镜像
npm install -g cnpm --registry=https://registry.npm.taobao.org

# 全局安装 vue-cli
$ npm install --global vue-cli

# 创建一个基于 webpack 模板的新项目
$ vue init webpack my-project

安装依赖，走你
$ cd my-project
$ npm run dev
```


#### 调试
1. [https://github.com/vuejs/vue-devtools](https://github.com/vuejs/vue-devtools)

## 五、示例
文档（作者是中国人） + <span data-type="color" style="color:rgb(26, 26, 26)"><span data-type="background" style="background-color:rgb(255, 255, 255)">官网上的示例 + 自己练习（推荐jsfiddle）</span></span>
主要了解：<span data-type="color" style="color:rgb(26, 26, 26)"><span data-type="background" style="background-color:rgb(255, 255, 255)">响应式机制 + 组件</span></span>

Hello World：[https://jsfiddle.net/han8gui/nnc957z4/10/](https://jsfiddle.net/han8gui/nnc957z4/10/)
Form：[https://jsfiddle.net/han8gui/g072h4x6/](https://jsfiddle.net/han8gui/g072h4x6/)
ToDoList： [https://jsfiddle.net/han8gui/r42pngbu/6/](https://jsfiddle.net/han8gui/r42pngbu/6/)

## 六、组件
#### 定义
软件组件<span data-type="color" style="color:rgb(34, 34, 34)"><span data-type="background" style="background-color:rgb(255, 255, 255)">，定义为自包含的、可编程的、可重用的、与语言无关的</span></span>软件<span data-type="color" style="color:rgb(34, 34, 34)"><span data-type="background" style="background-color:rgb(255, 255, 255)">单元。</span></span>

#### 示例：
[https://jsfiddle.net/han8gui/0c6xszjv/](https://jsfiddle.net/han8gui/0c6xszjv/)
注意：    
1. 一个组件的 data 选项必须是一个函数  
2. 定义组件名的方式有两种：  
    a. 使用 kebab-case
    当使用 kebab-case (短横线分隔命名) 定义一个组件时，你也必须在引用这个自定义元素时使用 kebab-case，例如 `<my-component-name>`。  
    b. 使用 PascalCase
    当使用 PascalCase (驼峰式命名) 定义一个组件时，你在引用这个自定义元素时两种命名法都可以使用。

#### <a name="qm5ych"></a>生命周期  


![20180205153631960.png | center | 826x2093](https://cdn.yuque.com/yuque/0/2018/png/103176/1525935779079-1d9cea4f-35e0-44ae-a86c-7d6f5f594404.png "")

#### 数据传递
<span data-type="color" style="color:rgb(38, 38, 38)"><span data-type="background" style="background-color:rgb(255, 255, 255)">子组件中传递数据：Props</span></span>
示例: [https://jsfiddle.net/han8gui/hqmgnbhy/](https://jsfiddle.net/han8gui/hqmgnbhy/)

<span data-type="color" style="color:rgb(38, 38, 38)"><span data-type="background" style="background-color:rgb(255, 255, 255)">子组件</span></span><span data-type="color" style="color:rgb(52, 73, 94)"><span data-type="background" style="background-color:rgb(255, 255, 255)">向父级组件触发一个事件</span></span>
<span data-type="color" style="color:rgb(52, 73, 94)"><span data-type="background" style="background-color:rgb(255, 255, 255)">内建的 </span></span>[$emit 方法](https://cn.vuejs.org/v2/api/#%E5%AE%9E%E4%BE%8B%E6%96%B9%E6%B3%95-%E4%BA%8B%E4%BB%B6)<span data-type="color" style="color:rgb(52, 73, 94)"><span data-type="background" style="background-color:rgb(255, 255, 255)">并传入事件的名字，来向父级组件触发一个事件，</span></span><span data-type="color" style="color:rgb(47, 47, 47)"><span data-type="background" style="background-color:rgb(255, 255, 255)">并传递一个参数</span></span>

## 七、规模化
1. 路由 <span data-type="color" style="color:rgb(26, 26, 26)"><span data-type="background" style="background-color:rgb(255, 255, 255)">vue-router</span></span>
    [https://github.com/han8gui/vue-demo](https://github.com/han8gui/vue-demo)
2. 状态管理 vuex
    <span data-type="color" style="color:rgb(52, 73, 94)"><span data-type="background" style="background-color:rgb(255, 255, 255)">记录所有 store 中发生的 state 改变，后面有机会分享下</span></span>
3. 服务端渲染 ssr
主要用于SEO
## 八、其他
1. 风格指南：[https://cn.vuejs.org/v2/style-guide/](https://cn.vuejs.org/v2/style-guide/)
2. 编码：开发过程中，可以看到bug报错
3. Examples: [https://vuejsexamples.com/](https://vuejsexamples.com/)

