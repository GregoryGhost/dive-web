<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Testing PHP+MySQL</title>
    <link href="../../design/index.css" rel="stylesheet" type="text/css" />
    <link href="../../design/table.css" rel="stylesheet" type="text/css" />
    <link href="../../design/form.css" rel="stylesheet" type="text/css" />
    <script src="../../jsScripts/menu.js" type="text/javascript" ></script>
    <script src="../../jsScripts/jquery-3.2.1.js" type="text/javascript" ></script>
</head>

<body onload="setHandlerForMenus();">
    <div id="container">
        <div id="header">
            <h1>Обновление данных в таблице MySQL</h1>
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
            <h2>Изменение данных таблицы БД</h2>
            <form name="formLogOut" method="post" action="./ajax.php">
				<input type="hidden" name="act" value="logout">
				<button type="submit">Выйти из аккаунта</button>
			</form>
            <form id="formUpdateTable" name="formUpdateTable" action="" method="POST">
                <label for="name">Input data for your name</label>
                <input id="name" name="name" type="text" pattern="[А-Я]{1}[а-я]{1,50}" placeholder="enter data here" value="" required/>
                <input name="hiddenSubmit" type="submit" value="" hidden />
                <input id="validOnServer" name="checkData" type="button" value="Send" />
            </form>
            <div id="valid"></div>
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
