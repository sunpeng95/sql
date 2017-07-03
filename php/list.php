<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>教材列表</title>
    <style type="text/css">
        body{
            min-width: 870px;
        }

        p{
            text-align:center;
            font-size:50px;
            margin-bottom:10px;
        }

        table{
            border:solid 1px black;
            width: 80%;
            margin-left: 10%;
        }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript">
    function change_page(){
        window.location.href="/sql/php/order.php"
    };
    $(document).ready(function(){
        $($(this).attr('id')).click(function(){
            $.ajax({
                url: "#",
                method:"post",
                data:"data",
                success:function(){
                    print("sdsf");
                },
            });
        });
    });
    </script>
</head>
<body>
    <p>高校教材订购列表</p>
    <hr>
    <div>         
        <table>
            <thead>
                <tr>
                    <th>编号</th>
                    <th>书名</th>
                    <th>作者</th>
                    <th>出版社</th>
                    <th>出版社地址</th>
                    <th>联系人</th>
                    <th>联系电话</th>
                    <th>订购</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <form action="order.php" method="post">
            <?php
                $db = mysqli_connect("localhost","root","11111111","book");
                $sql_select = "SELECT * FROM textbook";
                $resule = mysqli_query($db,$sql_select);
                $result = mysqli_fetch_all($resule);
                foreach ($result as $key => $value):
            ?>
                    <tr id="<?= $value[0] ?>">
                        <th><?= $value[0] ?></th>
                        <th><?= $value[1] ?></th>
                        <th><?= $value[2] ?></th>
                        <th><?= $value[3] ?></th>
                        <th><?= $value[4] ?></th>
                        <th><?= $value[5] ?></th>
                        <th><?= $value[6] ?></th>
                        <th><input type="submit" value="订购"></th>
                        <th><input type="button" id="less<?= $value[0] ?>" value="删除书籍"></th>
                    </tr>
            <?php endforeach; ?>
                </form>
            </tbody>
        </table>
        <input type="submit" style="margin-left:85%;" value="确定">
        <input type="button" value="添加书籍">
    </div>
    <?php 
        if(method=="post"){
            echo 'data';
        };
    ?>
</body>
</html>