<?php
$file = 'chat.json';

if (!file_exists($file)) {
  file_put_contents($file, json_encode([]));
}

$messages = json_decode(file_get_contents($file), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);

  $messages[] = [
    'name' => $data['name'],
    'room' => $data['room'],
    'text' => $data['message'],
    'time' => $data['timeskip']
  ];

  file_put_contents($file, json_encode($messages));
  echo json_encode(['status' => 'ok']);
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $room = $_GET['room'];
  $timeskip = intval($_GET['timeskip']);

  $filtered = array_filter($messages, function($msg) use ($room, $timeskip) {
    return $msg['room'] === $room && $msg['time'] > $timeskip;
  });

  echo json_encode(['messages' => array_values($filtered)]);
  exit;
}
?>
