   <!DOCTYPE HTML>
    <HTML>

    <HEAD>
        <title>Регистрация на DotaLIVE</title>
        <meta charset="utf-8">
        <meta name="author" content="Кулаков Григорий Викторович">
        <meta name="copyright" content="Защищено авторскими правами, в случае нарушения пеняйте на себя =).">
        <link href="../../design/index.css" rel="stylesheet" type="text/css" />
        <link href="../../design/table.css" rel="stylesheet" type="text/css" />
        <link href="../../design/form.css" rel="stylesheet" type="text/css" />
        <script src="../../jsScripts/jquery-3.2.1.js" type="text/javascript" ></script>
        <script src="../../jsScripts/menu.js" type="text/javascript"></script>
        <script src="../../jsScripts/time.js" type="text/javascript"></script>
        <script src="../../jsScripts/form.js" type="text/javascript"></script>
        <script src="../../jsScripts/ajax-form.js" type="text/javascript"></script>
        <script language="javascript">
            window.onbeforeunload = (e) => true;

            function callInstallHandlerForElements() {
                setHandlerForMenus();
            }
        </script>
        <style>
        </style>
    </HEAD>

    <body onload="callInstallHandlerForElements();">
        <div id="container">
            <div id="header">
                <h1>Dota2 Live</h1>
            </div>
            <div id="nav">
                <ul>
                    <li>
                        <a href="index.html">Обзор</a>
                    </li>
                    <li>
                        <a href="matches.html">Матчи</a>
                    </li>
                    <li>
                        <a href="twitch.html">Любимые стримы</a>
                    </li>
                    <li>
                        <a href="hero_records.html">Рекорды</a>
                    </li>
                    <li>
                        <a href="things.html">Предметы</a>
                    </li>
                    <li>
                        <a href="stata.html">Статистика</a>
                    </li>
                    <li>
                        <a href="active.html">Активность</a>
                    </li>
                </ul>
            </div>
            <div id="text">
                
                <h1>Личная информация</h1>
                <h2>Заполните следующие поля</h2>
                <p><a href="./index.php?redirect=auth">Уже зарегистрированы? Войти в учетную запись.</a></p>
               <!--Проверочка данных перед отправкой -->
               <!-- <form name="form1" oninput="heightoutput.value=height.value" action="./lib/echoPostRegistration.php" method="POST"> -->
               <form class="ajax" id="formEditProfile" name="formEditProfile" oninput="heightoutput.value=height.value" action="./ajax.php" method="POST">
					<div class="main-error"></div>
                    <fieldset>
                        <legend>Придумайте логин и пароль</legend>
                        <!--Login-->
                        <label for="login">Логин:</label>
                        <input name="login" type="text" value="" id="login" pattern="[a-z0-9]{6,25}" placeholder="gregory322" /><br>
                        <!--Password-->
                        <!--Требования к паролю: Минимум 8 символов, одна цифра,одна буква в верхнем регистре и одна в нижнем-->
                        <label for="password1">Пароль:</label>
                        <input name="password1" type="password" value="" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" placeholder="QwertY322U228" /><br>
                        <label for="password2">Подтвердите пароль:</label>
						<input name="password2" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" placeholder="QwertY322U228"><br>
                    </fieldset>

                   

                    <!--check data-->
                    <!--<input type="submit" name="check" value="Проверить">-->
                    <input type="hidden" name="act" value="register">
                    <!-- old variant <input name="hiddenSubmit" type="submit" value="" hidden /> -->
					<!-- old variant <input id="validOnServer" name="check" type="submit" value="Проверить/Отослать" /> -->
					<button type="submit">Проверить/Отправить</button>
                    <!--автозаполнение формы-->
                    <input name="autofill" type="button" onclick="autofillForm(document.forms[0]);" value="Автозаполнение &#128526"/>
                    <!--reset value-->
                    <input type="reset" name="reset" value="Сбросить">
                </form>
                
            </div>
            <div id="news">
                <h3>Обзор профиля</h3>
                <ul>
                    <li>
                        <h2>Асуна-молния</h2>
                        <img class="avatar" src="../../images/ava/avatarAsuna.jpg" title="Асуна-молния" alt="Avatar" />
                    </li>
                    <li>Доля Побед: 55%</li>
                    <li>
                        <img style="width: 75%;" src="../../images/ava/avatar.jpg" title="Асуна-молния" alt="Avatar" />
                        <img style="width: 50%" src="../../images/ava/avatar.jpg" title="Асуна-молния" alt="Avatar" />
                    </li>
                </ul>
                <h3>Dota2 Live</h3>
                <ul>
                    <li>
                        <a href="index.html">Обзор</a>
                    </li>
                    <li>
                        <a href="matches.html">Матчи</a>
                    </li>
                    <li>
                        <a href="twitch.html">Любимые стримы</a>
                    </li>
                    <li>
                        <a href="hero_records.html">Рекорды</a>
                    </li>
                    <li>
                        <a href="things.html">Предметы</a>
                    </li>
                    <li>
                        <a href="stata.html">Статистика</a>
                    </li>
                    <li>
                        <a href="active.html">Активность</a>
                    </li>
                </ul>
                <h3>Текущее время</h3>
                <ul>
                    <li>
                        <p id="colorTime" onmouseover="setColorTime();" style="font-size:150%; text-align: center;">Цветное время</p>
                    </li>
                </ul>
            </div>
            <div class="clearfloat"></div>
            <div id="footer">
                <p>
                    <Обзор | <a href="matches.html">Матчи</a> |
                        <a href="twitch.html">Любимые стримы</a> |
                        <a href="hero_records.html">Рекорды</a> |
                        <a href="things.html">Предметы</a> |
                        <a href="stata.html">Статистика</a> |
                        <a href="active.html">Активность</a>
                </p>
            </div>
        </div>
    </body>

    </HTML>
