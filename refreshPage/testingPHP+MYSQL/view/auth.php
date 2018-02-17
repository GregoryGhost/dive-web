<!doctype HTML>
<html>

<head>
    <title>Testing PHP+MySQL</title>
     <meta charset="utf-8">
    <link href="../../design/index.css" rel="stylesheet" type="text/css" />
    <link href="../../design/table.css" rel="stylesheet" type="text/css" />
    <link href="../../design/form.css" rel="stylesheet" type="text/css" />
    <script src="../../jsScripts/jquery-3.2.1.js" type="text/javascript" ></script>
    <script src="../../jsScripts/menu.js" type="text/javascript"></script>
    <script src="../../jsScripts/ajax-form.js" type="text/javascript"></script>
</head>

<body onload="setHandlerForMenus();">
    <div id="container">
        <div id="header">
            <h1>Аутентификация</h1>
        </div>
        <div id="nav">
            <ul>
                <li>
                    <a href="../../index.html">На главную DotaLive</a>
                </li>
                <li>
                    <a href="../trollGaben.html">Обзор экспериментов</a>
                </li>
            </ul>
        </div>
        <div id="text">
            <h2>Аутентификация</h2>
            <form class="ajax" method="post" action="./ajax.php">
                <div class="main-error"></div>
                <input name="login" type="text" placeholder="Username" autofocus><br>
                <input name="password" type="password" placeholder="Password"><br>        
                <label>
					<input name="remember-me" type="checkbox" value="remember-me" checked> Запомнить меня
				</label><br>
                <input type="hidden" name="act" value="login">
                <button type="submit">Войти</button>
                <p><a href="./index.php?redirect=registration">Нету учетной записи? Регистрация.</a></p>
            </form>
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
