<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> ToDoリスト</title>
</head>
<body>
<h2>ToDoリスト一覧</h2>
<a href="todo_add.php">新規ToDoを追加する</a><br/><br/>

<?php

try
{

$dsn='mysql:dbname=posts;host=localhost;charset=utf8';
$user='root';
$password='root';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT * FROM todo'; //where文いる？
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '<form method=post action="todo_edit.php">';
while(true)
{
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false)
    {
        break;
    }
    foreach ($rec as $r)
    {
        print $r.':';
    }
    print '<form method=post action="todo_edit.php">';
    print'<input type="submit" value="修正">';
    print'</input form>';
    print '<br/>';
    print '<hr>';

}

}
catch (Exception $e)
{
   // print'ただいま障害により大変ご迷惑をお掛けしております。 ';
    echo $e->getFile(), '/', $e->getLine(), ':', $e->getMessage();
	exit();
}

?>

</body>
</html>