<!doctype HTML>
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
            <h1>Вывод содержимого таблиц</h1>
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
            <h2>Select from tables</h2>
            <?PHP
	      include "connectToDB.php";
	      
	      $tableBase = "test";
	      $tableAdditional = "additional_user_info";
	      
	      $query = "Select * from " . $tableBase;
	      
	      $result = mysqli_query($link, $query);
	      if($result == null){
	       print("В таблице ". $tableBase . " отсутствуют записи");
	       exit();
	      }

	      print("<table class=\"data\">");
	      print("<tr>");
	       printf("<th class=\"data-item\">%s</td>", "Name");
	       //printf("<th class=\"data-item\">%s</td>", "Class");
	       //printf("<th class=\"data-item\">%s</td>", "Money");
	      print("</tr>");
	      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	       print("<tr>");
	       printf("<td class=\"data-item\">%s</td>",$row["name"]);
	       print("</tr>");
	      }
	      print("</table>");
	      //printf (" %s | %s (%s)\n", $row[0], $row["class"], $row["money"]);
	      //$row = mysqli_fetch_array($result, MYSQLI_BOTH);
	      //printf (" %s | %s (%s)\n", $row[0], $row["class"], $row["money"]);
	      /* free result set */
	      mysqli_free_result($result);

	      /*$sql = "CREATE DATABASE $dbName";
	      if (mysqli_query($link, $sql)){
	      print("Success DB created\n");
	      }else{
	      print("Error create db \n");
	      }*/
	      mysqli_close($link);

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
