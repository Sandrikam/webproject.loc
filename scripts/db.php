<?php
  /*/////////////////////////////////////////
  |   Application: WEB1Project              |
  |   Start Date: 07.10.2018                |
  |   Author: ABGEO                         |
  |   Website: www.ABGEO.ga                 |
  |   Email: abgeo@abgeo.ga                 |
  |   File: db.php                          |
  |   Patch: /scripts                       |
  |   Create Date: 08.10.2018               |
  /////////////////////////////////////////*/

  require_once("app_config.php");

  mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("<p>Connection Error: " . mysql_error() . "</p>");
  mysql_select_db(DB_NAME) or die("<p>Error: ". mysql_error() . "</p>");

	mysql_query("SET NAMES 'utf8';");
	mysql_query("SET CHARACTER SET 'utf8';");
	mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
?>
