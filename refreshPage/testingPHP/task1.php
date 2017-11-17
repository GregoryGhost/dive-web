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

            <h2>Площадь трапеции №1</h2>
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
$hOfTrapeze      = $_GET['hOfTrapeze'];
$baseOfTrapeze   = $_GET['baseOfTrapeze'];
$capOfTrapeze    = $_GET['capOfTrapeze'];
$paramsOfTrapeze = array(
    $hOfTrapeze,
    $baseOfTrapeze,
    $capOfTrapeze
);
if (checkIsNumbers($paramsOfTrapeze))
{
    $squareOfTrapeze = 0.5 * $hOfTrapeze * ($baseOfTrapeze + $capOfTrapeze);
    print("<p>Высота трапеции: $hOfTrapeze</p>");
    print("<p>Основание трапеции: $baseOfTrapeze</p>");
    print("<p>Крышка трапеции: $capOfTrapeze</p>");
    print("<p>Площадь трапеции: $squareOfTrapeze единиц<sup>2</sup></p>");
}
else
{
    $strBadValues = implode(", ", $paramsOfTrapeze);
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