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
               <form class="ajax" id="formEditProfile" name="formEditProfile" oninput="heightoutput.value=height.value" action="./lib/echoPostRegistration.php" method="POST">
					<div class="main-error"></div>
					<input type="hidden" name="act" value="register">
                    <fieldset>
                        <legend>Придумайте логин и пароль</legend>
                        <!--Login-->
                        <label for="login">Логин:</label>
                        <input name="login" type="text" value="" id="login" pattern="[a-z0-9]{6,25}" placeholder="gregory322" required><br>
                        <!--Password-->
                        <!--Требования к паролю: Минимум 8 символов, одна цифра,одна буква в верхнем регистре и одна в нижнем-->
                        <label for="password1">Пароль:</label>
                        <input name="password1" type="password" value="" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" placeholder="QwertY322U228" required><br>
                        <label for="password2">Подтвердите пароль:</label>
						<input name="password2" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" placeholder="QwertY322U228" required><br>
                    </fieldset>
					<fieldset>
                        <legend>Заполните обязательную личную информацию</legend>
                        <!--123 ФИО-->
                        <label for="firstName">Фамилия:</label>
                        <input type="text" id="firstName" name="firstName" pattern="[А-Я]{1}[а-я]{1,50}" placeholder="Кулаков" required><br>
                        <label for="secondName">Имя:</label>
                        <input type="text" id="secondName" name="secondName" pattern="[А-Я]{1}[а-я]{1,50}" placeholder="Григорий" required><br>
                        <label for="thirdName">Отчество:</label>
                        <input type="text" id="thirdName" name="thirdName" pattern="[А-Я]{1}[а-я]{1,50}" placeholder="Викторович" required><br>
                        <!--4 телефон pattern="(\+?\d[- .]*){7,13}"-->
                        <label for="phone">Номер сотового телефона:+7</label>
                        <input type="tel" id="phone" name="phone" pattern="(\d{3}-){2}\d{2}-\d{2}" placeholder="951-592-29-51" required><br>
                        <!--5 мыло-->
                        <label for="mail">E-mail:</label>
                        <input type="email" id="mail" name="mail" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,3}" placeholder="kulakov-griha96@ya.ru" required><br>
                        <!--6 паспортные данные-->
                        <label for="passport">Серия и номер паспорта:</label>
                        <input type="tel" id="passport" name="passport" pattern="\d{4}-\d{6}" placeholder="1857-845987" required><br>
                        <!--7 номер карты-->
                        <label for="card">Номер банковской карты:</label>
                        <input type="tel" name="card" placeholder="5464-1110-1093-1106" pattern="(\d{4}-){3}\d{4}" required><br>
                        <!--8 дата рождения-->
                        <label for="birthDay">Дата рождения:</label>
                        <input type="date" id="birthDaty" name="birthDay" required placeholder="1996-05-28"><br>
                    </fieldset>
                   <fieldset>
                        <legend>Дополнительная информация</legend>
                        <!--9 рост-->
                        <label for="height">Рост:</label>
                        <output name="heightoutput">178</output>
                        <input type="range" id="height" name="height" min="40" max="300" value="178" placeholder="178"><br>
                        <!--10 ос на компе-->
                        <label for="os">ОС на компе:</label>
                        <select id="os" name="os">
							<option disabled>Выберите ОС на компе</option>
							<option value="Gentoo" selected>Gentoo</option>
							<option value="XP">Windows XP</option>
							<option value="Ubuntu">Ubuntu</option>
							<option value="Mint">Linux Mint</option>
							<option value="Lubuntu">Lubuntu</option>
							<option value="Arch">Arch</option>
							<option value="Win10">Windows 10</option>
							<option value="Debian">Debian</option>
						</select><br>
                        <!--11 любимый браузер-->
                        <label>Любимый браузер:</label>
                        <input type="radio" name="loveBrowser" value="chrome" checked>Google Chrome
                        <input type="radio" name="loveBrowser" value="firefox">Mozilla Firefox
                        <input type="radio" name="loveBrowser" value="opera">Opera<br>
                        <!--12 знакомые яп-->
                        <label for="familiarLP">Знакомые языки программирования:</label>
                        <select id="familiarLP" name="LP">
							<option disabled>Выберите Знакомый язык программирования</option>
							<option value="fsharp" selected>F#</option>
							<option value="csharp">C#</option>
							<option value="js">JavaScript</option>
							<option value="cpp">C++</option>
							<option value="ts">TypeScript</option>
							<option value="python">Python</option>
							<option value="haskell">Haskell</option>
						</select><br>
                        <!--13 любимая парадигма программирования-->
                        <label for="loveP">Любимая парадигма программирования:</label>
                        <select id="loveP" name="P">
							<option disabled>Выберите парадигму</option>
							<option value="fp" selected>Функциональная</option>
							<option value="oop">Объектно-ориентированная</option>
							<option value="proc">Императивная</option>
							<option value="logic">Логическая</option>
							<option value="define">Декларативная</option>
						</select><br>
                        <!--14 родной язык-->
                        <label for="nativeLang">Родной язык</label>
                        <select id="nativeLang" name="nativeLang">
							<option disabled>Выберите язык</option>
							<option value="ru" selected>Русский</option>
							<option value="en">Английский</option>
							<option value="jp">Японский</option>
						</select><br>
                        <!--15 веб-сайт-->
                        <label for="site">Ваш сайт:</label>
                        <input type="url" id="site" name="site" placeholder="http://www.vk.com/mardlockscramble"><br>
                    </fieldset>

                    <!--check data-->
                    <!--<input type="submit" name="check" value="Проверить">-->
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
