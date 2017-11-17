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
function calcY($valueX)
{
    $result = 0;
    switch ($valueX)
    {
        case ($valueX < 10):
            $result = 7.5 * $valueX;
            break;
        case ($valueX > 12):
            $result = 2.1 * $valueX - 10;
            break;
        case (10 <= $valueX && $valueX <= 12):
            $result = 5 * $valueX - 3;
            break;
    }
    return $result;
}
$x = $_POST['x'];
if (is_numeric($x))
{
    $y = calcY($x);
    print("<p>Вычисленное значение Y($x): $y</p>");
}
else
{
    print("<p>Введенные данные являются какой-то нечисловой дичью (поданные данные: $x), вычисления прекращены.</p>");
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