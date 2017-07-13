<?php
$server = $_SERVER['SERVER_NAME'];
$web_env_dev   = "localhost";
$web_env_train = "vnpftdb-train.us-east-2.elasticbeanstalk.com";
$web_env_prod  = "vnpftdb-prod.us-east-2.elasticbeanstalk.com";
$ft_db_env_dev    = "localhost";
$ft_db_env_train  = "vnpftdb-train.cbzqweksvncd.us-east-2.rds.amazonaws.com";
$ft_db_env_prod   = "vnpftdb-prod.cbzqweksvncd.us-east-2.rds.amazonaws.com";
$hostname = "";
if ($server===$web_env_dev  ) { $hostname = $ft_db_env_dev;   }
if ($server===$web_env_train) { $hostname = $ft_db_env_train; }
if ($server===$web_env_prod ) { $hostname = $ft_db_env_prod;  }
$database = "ftdb";
$username = "FTDBAdmin";
$password = "vnpdb2017";
$ftdb = mysqli_connect($hostname, $username, $password, $database) 	or die('Error connecting to VNP Field Team database.');
?>
