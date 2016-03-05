# Websites Group of Campus

A web-service based campus websites group system. And this is the part of service and server. The part of android application source code can be see [here](https://github.com/milkcu/campus-app).

这是一个基于Web Service的网站群系统，项目使用NuSOAP采用模块化设计，提供超级管理员和子站点管理员两级管理，拥有网页版应用和Android客户端，还可通过Web服务调用相关接口扩展系统。

## 安装部署

系统采用Web Service架构，可部署与分布式环境中，文件夹下的目录为各个服务器的文件配置。

`web`目录为网页应用服务器文件，该服务器为网页端服务器，地址为<http://www.milkcu.com/campus/web/>；  
`app`目录为Android客户端服务器文件，该服务器为安卓客户端服务器地址为<http://www.milkcu.com/campus/app/>；  
`admin`目录为后台管理系统服务器文件，该服务器为系统管理服务器地址为<http://www.milkcu.com/campus/admin/>；  
`db`目录为数据库与服务直接交互的服务器文件，该服务器为Web Service服务器地址为<http://www.milkcu.com/campus/db/nusoapService.php>。

Web Service的WSDL语言描述详见<http://www.milkcu.com/campus/db/nusoapService.php?wsdl>

## 设计与实现

关于系统的设计与实现可以参考下面的链接。

* 系统介绍：
<http://www.milkcu.com/campus/web/?view=post&pid=1>
* 思维导图：
<http://www.milkcu.com/campus/web/?view=mind>
* 架构设计：
<http://www.milkcu.com/campus/web/?view=post&pid=3>
* 服务接口：
<http://www.milkcu.com/campus/web/?view=service>
* 接口说明：
<http://www.milkcu.com/campus/web/?view=post&pid=2>

## Android客户端

可以通过下面的链接下载安装使用
**<http://www.milkcu.com/campus/app/campus.apk>**。

Android客户端基于开源项目[eoe安卓客户端](https://github.com/eoecn/android-app/)，源码参见[https://github.com/milkcu/campus-app](https://github.com/milkcu/campus-app)。

-EOF-
