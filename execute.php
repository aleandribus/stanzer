<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

/*
$db_host="ec2-46-137-73-65.eu-west-1.compute.amazonaws.com";
$db_name="dfpo6s4cejhtek";
$db_user="hhsgfktszmuzvf";
$db_port="5432";
$db_pwd="VpdQoAWp-gYjNfNqv2aUK3jyb5";

$db_conn = pg_connect ("host=$db_host port=$db_port dbname=$db_name user=$db_user password=$db_pwd");

if (!$db_conn)
	$text="Connessione DB non riuscita";
else{	
	$text = trim($text);
	$text = strtolower($text);
	
	if ($text=='create table'){
		$create="CREATE TABLE users(
			   ID INT PRIMARY KEY     NOT NULL,
			   USERNAME       TEXT    NOT NULL
		);";
		$res=pg_execute($query);
		
		if (!$res)
			$text.=" Errore create table: ".pg_last_error($db_conn);
		else
			$text.=" CREATE TABLE";
	}
	
	$rec = pg_query($db_conn, 'Select * From users');
	
	if (!$rec)
	 	$text.=' Errore query: '.pg_last_error($db_conn);
	else
		pg_query($db_conn, "INSERT INTO users(ID,USERNAME) VALUES ($chatId,'$username');");
}

$db_host="sql7.freemysqlhosting.net";
$db_name="sql7124622";
$db_user="sql7124622";
$db_pwd="pxU2UYDyxT";
$db_port="3306";

$db_conn = mysql_connect($db_host.":".$db_port, $db_user, $db_pwd);
if (!$db_conn)
	$text.="Connessione DB non riuscita";
else{	
	if (!mysql_select_db($db_name, $db_conn))
		$text.=" Errore select db";

	$text. = trim($text);
	$text. = strtolower($text);
	
	if (!mysql_query("INSERT INTO users(ID,USERNAME) VALUES ($chatId,'$username');"))
		$text.=" Errore insert";
}
mysql_close($db_conn);*/

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);

