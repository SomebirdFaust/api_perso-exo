<?php
header('Access-Control-Allow-Origin: *');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: OPTIONS, GET');
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
header('Content-Type: application/json');
echo json_encode    (["systemTime" => date("Y-m-d H:i:s")]);
} else {
http_response_code(405);
}

?>