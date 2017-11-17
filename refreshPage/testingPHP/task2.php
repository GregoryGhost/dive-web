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
            <h2>Вычисление значения Y №2</h2>
            <?PHP
function checkIsNumbers($avalue)
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
$h      = $_GET['h'];
$t      = $_GET['t'];
$params = array(
    $h,
    $t
);
if (checkIsNumbers($params))
{
    if ($t == 0)
    {
        print("<p><span style=\"color:red;\">Некорректно введенные данные - </span>деление на ноль невозможно, T = 0.</p>");
    }
    else
    {
        $y = 9 / $t - $h + 5 * $t;
        print("<p>H: $h</p>");
        print("<p>T: $t</p>");
        print("<p>Y: $y</p>");
    }
}
else
{
    $strBadValues = implode(", ", $params);
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