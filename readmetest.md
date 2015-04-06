DERRY TEST
===
`start`
----
    我在本地上安装了git<br>
    一开始遇到的问题：/var/run.yum.pid 已被PID为2845的锁定<br>
* 尝试一：su kill 2845 `失败`<br>
* 尝试二：rm -f /var/run/yum.pid `成功`<br>
<br>
然后创建了一个仓库repository并初始化git init --bare myprj<br>
配置了用户信息：git config --global user.name "deryy"  git config --global user.email "shenglue"<br>
#初始化提交
mkdir initial.commit<br>
cd initial.commit<br>
git remote add origin +目录<br>
touch Readme<br>
git add Readme<br>
git commit -m "initial commit"<br>
<br>
一开始目录写错了但没报错一步步下去到git push origin master的时候才出错<br>
然后只能git remote rm origin重来一边<br>
反正最后可以了<br>
#正常使用不知道为什么#没有用
git commit -m "modify readme" Readme<br>
git push<br>
成功了，但是不知道怎么和网上连起来0.0～～<br>
------------
[来个小链接](http://www.baidu.com  "悬停显示")
* 菜菜
  * 豆豆
    * 柴柴

`end`
------



