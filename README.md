# yaf-skel

本项目是一个yaf框架骨架代码生成项目。

一键创建yaf项目骨架代码，和作者提供的[工具](https://github.com/laruence/yaf/tree/master/tools/cg)生成的目录结构是一样的，免去克隆整个项目的繁琐。

## Usage

### 一键安装

安装好Yaf扩展之后，进入到指定目录后，执行

```
composer create-project phpcasts/yaf-skel yaf-demo -vvv
```

到此，yaf初始化项目安装完毕。


### 开启/关闭命名空间

这里提供了两个脚本，用来开启或关闭命名空间，免去手动修改的麻烦。


```
// 开启 namespace
sh open_namespace.sh

// 关闭 namesapce
sh close_namespace.sh
```



## 扩展

如果觉的初始化的代码提供的功能太少，可以看看此项目: [yaf-skeleton](https://github.com/qloog/yaf-skeleton)，README里有详细说明



