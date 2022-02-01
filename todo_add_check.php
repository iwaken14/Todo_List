<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>check_page</title>
</head>
<body>
<h1>
    以下の内容で登録しますか？
</h1>
<?php
$todo_titles=$_POST['titles'];
$todo_content=$_POST['contents'];
$date = date('Y-m-d H:i:s', strtotime('+9hour'));

$todo_titles=htmlspecialchars($todo_titles,ENT_QUOTES,'UTF-8');
$todo_content=htmlspecialchars($todo_content,ENT_QUOTES,'UTF-8');
$date=htmlspecialchars($date,ENT_QUOTES,'UTF-8');

echo "タイトル:" .$todo_titles."<br/>";
print "内容:".$todo_content;

print '<form method="post" action="todo_add_done.php">';
print '<input type="hidden" name="titles" value="'.$todo_titles.'">';
print '<input type="hidden" name="contents" value="'.$todo_content.'">';
print '<input type="hidden" name="date" value="'.$date.'">';
print '<br />';
print '<input type="button" onclick="history.back()" value="戻る">';
print '<input type="submit" value="ＯＫ">';
print '</form>';

?>


</form>
</body>
</html>