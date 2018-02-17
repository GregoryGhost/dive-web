<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Testing PHP+MySQL</title>
    <link href="../../design/index.css" rel="stylesheet" type="text/css" />
    <link href="../../design/table.css" rel="stylesheet" type="text/css" />
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
                    <a href="workWithTables.html">Работа с MySQL</a>
                </li>
            </ul>
        </div>
        <div id="text">

            <h2>Вывод данных, переданных методом POST</h2>
            <?PHP
/*Printing content from POST in table*/
$classItem = "\"data-item\"";
print("<table class=\"data\">");
print("<tr>");
printf("<th class=%s>%s</th>", $classItem, "Поле");
printf("<th class=%s>%s</th>", $classItem, "Содержимое");
print("</tr>");
foreach($_POST as $key => $value){
	if(is_array($value) && !empty($value)){
		$lvalue=count($value);
		print("<tr>");
		printf("<td class=%s rowspan=%d>%s</td>", $classItem, $lvalue, $key);
		printf("<td class=%s>%s</td>", $classItem, $value[0]);
		print("</tr>");
		for($i=1; $i<$lvalue; $i++){
			print("<tr>");
			printf("<td class=%s>%s</td>", $classItem, $value[$i]);
			print("</tr>");
		}
	}
	else{
		print("<tr>");
		printf("<td class=%s>%s</td>", $classItem, $key);
		printf("<td class=%s>%s</td>", $classItem, $value);
		print("</tr>");
	}
	print("</tr>");
}
print("<table>");

/*Checking data from POST on server side*/

?>
        </div>
        <div class="clearfloat"></div>
        <div id="footer">
            <p>
                Эксперименты на PHP+MYSQL | <a href="matches.html">Матчи</a> |
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