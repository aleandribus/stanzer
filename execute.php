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

$db_host="ec2-46-137-73-65.eu-west-1.compute.amazonaws.com";
$db_name="dfpo6s4cejhtek";
$db_user="hhsgfktszmuzvf";
$db_port="5432";
$db_pwd="VpdQoAWp-gYjNfNqv2aUK3jyb5";

$dbconn3 = pg_connect ("host=$db_host port=$db_port dbname=$db_name user=$db_user password=$db_pwd");

$text = trim($text);
$text = strtolower($text)." ".$dbconn3;

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
