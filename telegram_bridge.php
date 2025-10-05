<?php
// telegram_bridge.php
$token = "8011121063:AAEJvL59FqiYkTiXVHlI9YJtQzfbkG5MrQc";
$chat_id = "5074238280";

$data = json_decode(file_get_contents("php://input"), true);
$message = $data["message"] ?? "No message";

$url = "https://api.telegram.org/bot$token/sendMessage";

$ch = curl_init($url);
curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => [
    'chat_id' => $chat_id,
    'text' => $message
  ],
]);
$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
