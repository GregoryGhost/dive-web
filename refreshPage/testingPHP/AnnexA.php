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
            </ul>
        </div>
        <div id="text">
            <h2>Площадь трапеции №1</h2>
            <p align="left">Посчитать площадь трапеции.</p>
            <FORM name="formTrapeze" action=task1.php method="GET" oninput="heightOutput.value = hOfTrapeze.value;
                        baseOutput.value =  baseOfTrapeze.value;
                         capOutput.value = capOfTrapeze.value;">
                <label for="height">Высота трапеции:</label>
                <output name="heightOutput">1</output><br>
                <input type="range" id="height" name="hOfTrapeze" min="1" max="1000" value="1" requered><br>
                <label for="base">Основание трапеции:</label>
                <output name="baseOutput">1</output><br>
                <input type="range" id="base" name="baseOfTrapeze" min="1" max="1000" value="1" requered><br>
                <label for="cap">Крышка трапеции:</label>
                <output name="capOutput">1</output><br>
                <input type="range" id="cap" name="capOfTrapeze" min="1" max="1000" value="1" requered><br>
                <input type="submit" name="submit" value="Посчитать">
            </FORM>
            <h2>Вычислить значение Y №2</h2>
            <form name="formY" action=task2.php method="GET" oninput="tOutput.value=t.value; hOutput.value=h.value;">
                <label for="t">Значение T:</label>
                <output name="tOutput">1</output><br>
                <input type="range" id="t" name="t" min="1" max="1000" value="1" requered><br>
                <label for="h">Значение H:</label>
                <output name="hOutput">1</output><br>
                <input type="range" id="h" name="h" min="1" max="1000" value="1" requered><br>
                <input type="submit" name="submit" value="Посчитать">
            </form>
            <h2>Вычислить значение функции Y(X) №3</h2>
            <form name="formYfromX" action=task3.php method="POST" oninput="xOutput.value=x.value;">
                <label for="x">Значение X:</label>
                <output name="xOutput">1</output><br>
                <input type="range" id="x" name="x" min="1" max="1000" value="1" requered><br>
                <input type="submit" name="submit" value="Посчитать">
            </form>
            <h2>Вывести введенные числа (3) в порядке убывания №4</h2>
            <form name="formSortValues" action=task4.php method="POST" oninput="value1Output.value=value1.value; 
                                                                                    value2Output.value=value2.value;
                                                                                    value3Output.value=value3.value;">
                <label for="value1">Значение первого числа:</label>
                <output name="value1Output">1</output><br>
                <input type="range" id="value1" name="value1" min="1" max="1000" value="1" requered><br>

                <label for="value2">Значение второго числа:</label>
                <output name="value2Output">1</output><br>
                <input type="range" id="value2" name="value2" min="1" max="1000" value="1" requered><br>

                <label for="value3">Значение третьего числа:</label>
                <output name="value3Output">1</output><br>
                <input type="range" id="value3" name="value3" min="1" max="1000" value="1" requered><br>
                <input type="submit" name="submit" value="Вывести">
            </form>
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