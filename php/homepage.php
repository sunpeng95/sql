<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>高校教材管理</title> 
</head>
<body>
    <div style="border:solid 1px black;width:500px;height:309px;margin:161px 260px;text-align:center;">
        <p>用户登录</p>
        <form method="post" action="#">
            <div style="margin:50px 116px 0 100px;">
                <label>用户名：</label>
                <input type="text" name="username" placeholder="请输入用户名" style="width:150px;height:25px;">
            </div>
            <div style="margin:20px 130px 40px 130px;">
                <label>密码：</label>
                <input type="password" name="password" placeholder="请输入密码" style="width:150px;height:25px;">
            </div>
            <input type="submit" style="background-color:rgb(69,133,242);color:white;width:73px;height:35px;border:solid 0;border-radius:5px" value="登陆">
        </form>
    </div>
        <?php 
            $name = $_POST["username"];
            $pass = $_POST["password"];
            $db = mysqli_connect("localhost","root","11111111","book") or die("数据库关闭");
            $sql = "SELECT * FROM user WHERE name='$name' AND password='$pass'";
            $sql_url = "SELECT url FROM power WHERE name='$name'";
            $result = mysqli_query($db,$sql);
            $end = mysqli_fetch_all($result);
            var_dump($end);
            if ($end){
                $url = mysqli_query($db,$sql_url);
                $url = mysqli_fetch_all($url);
                $url = $url[0][0];
                echo "<script type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>";
            }else{
                echo "登录失败。。。你的密码写成了什么，填的又是谁的用户名啊。。。不是故意的吧";
            };
            mysqli_close($db);
        ?>
</body>
</html>