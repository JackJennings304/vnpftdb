<?php
$server = $_SERVER['SERVER_NAME'];
$web_env_dev   = "localhost";
$web_env_train = "vnpftdb-train.us-east-2.elasticbeanstalk.com";
$web_env_prod  = "vnpftdb-prod.us-east-2.elasticbeanstalk.com";
$mv_db_env_dev    = "localhost";
$mv_db_env_prod   = "vnpmvdb-prod.c8rnqcoyocrb.us-east-2.rds.amazonaws.com";
$mv_db_env_train  = $mv_db_env_prod;
$hostname = "";
if ($server===$web_env_dev  ) { $hostname = $mv_db_env_dev;   }
if ($server===$web_env_train) { $hostname = $mv_db_env_train; }
if ($server===$web_env_prod ) { $hostname = $mv_db_env_prod;  }
$database = "MVDB";
$username = "MVDBAdmin";
$password = "vnpdb2017";
$mvdb = mysqli_connect($hostname, $username, $password, $database) 	or die('Error connecting to VNP MI Voter database.');
?>
