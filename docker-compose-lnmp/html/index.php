<?php 
$servername = "192.168.0.110";    #注意这里要用自己自定义的Mysql的容器名
$username = "root";
$password = "123456";     #密码也可以直接使用yml中的变量名
$dbname="myDBPDO";        #变量设置
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // 开始事务
    $conn->beginTransaction();
    // SQL UPDATE 语句
    $conn->exec("UPDATE Student SET name='LL' WHERE id=031702667");
    //SQL  DELETE语句
    //$conn->exec("DELETE FROM Student where id=031700000");
    // 提交事务
    $conn->commit();
}
catch(PDOException $e)
{
    // 如果执行失败回滚
    $conn->rollback();
    echo $sql . "<br>" . $e->getMessage();
}
 
$conn = null;
?>

