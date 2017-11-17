<html>

<head>
 <title>Testing PHP</title>
    <link href="../../design/index.css" rel="stylesheet" type="text/css" />
    <link href="../../design/form.css" rel="stylesheet" type="text/css" />
    <link href="../../design/table.css" rel="stylesheet" type="text/css" />
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
                    <a href="experiments.html">Эксперименты с PHP</a>
                </li>
            </ul>
        </div>
        <div id="text">
    <h2>Вывод простых чисел от 1 до 1000</h2>
    <?PHP
function isPrime($number)
{
    $isSimple = $number >= 2;
    for ($i = 2; $i < round(sqrt($number)); $i++) {
        if (($number % $i) == 0) {
            return false;
        }
    }
    return $isSimple;
}
$maxNumber = 1000;
print("<table class=\"data\">");
print("<caption class=\"data-item\">Таблица простых чисел от 1 до 1000</caption>");
print("<tr>
                        <th class=\"data-item\">Номер</th>
                        <th class=\"data-item\">Число</th>
                     </tr>");
$k = 1;
for ($i = 1; $i <= $maxNumber; $i++) {
    if (isPrime($i)) {
        print("<tr>
                               <td class=\"data-item\">$k</td>
                                <td class=\"data-item\">$i</td>
                             </tr>");
        $k++;
    }
}
print("</table>");
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