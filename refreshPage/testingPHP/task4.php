<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Testing PHP</title>
    <link href="../../design/index.css" rel="stylesheet" type="text/css" />
    <link href="../../design/form.css" rel="stylesheet" type="text/css" />
    <script src="../../jsScripts/menu.js" type="text/javascript">
    </script>
</head>

<body onload="setHandlerForMenus();">
    <div id="container">
        <div id="header">
            <h1>Задания из Приложения А</h1>
        </div>
        <div id="nav">
            <ul>
                <li>
                    <a href="../../index.html">На главную DotaLive</a>
                </li>
                <li>
                    <a href="../trollGaben.html">Обзор экспериментов</a>
                </li>
                <li>
                    <a href="AnnexA.php">Задания из Приложения А</a>
                </li>
            </ul>
        </div>
        <div id="text">
            <h2>Вычисление значения Y(X) №3</h2>
            <?PHP
function check($avalue)
{
    for ($i = 0; $i < count($avalue); $i++)
    {
        if (!is_numeric($avalue[$i]))
        {
            return false;
        }
    }
    return true;
}
$values = array(
    $_POST['value1'],
    $_POST['value2'],
    $_POST['value3']
);
if (check($values))
{
    $enterValues = implode(", ", $values);
    print("<p>Введенные значения: $enterValues.</p>");
    $success = rsort($values);
    if ($success)
    {
        reset($values);
        $strValues = implode(", ", $values);
        print("<p>Отсортированные значения: $strValues.</p>");
    }
    else
    {
        print("<p>Ошибочка в сортировки массива.</p>");
    }
}
else
{
    $strBadValues = implode(", ", $values);
    print("<p>Введенные данные являются какой-то нечисловой дичью (поданные данные: $strBadValues , вычисления прекращены.</p>");
}
?>
        </div>
        <div class="clearfloat"></div>
        <div id="footer">
            <p>
                Эксперименты на PHP | <a href="matches.html">Матчи</a> |
                <a href="twitch.html">Любимые стримы</a> |
                <a href="hero_records.html">Рекорды</a> |
                <a href="things.html">Предметы</a> |
                <a href="stata.html">Статистика</a> |
                <a href="active.html">Активность</a>
            </p>
        </div>
    </div>
</body>

</html>