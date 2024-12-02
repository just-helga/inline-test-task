<?php
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../vendor/larapack/dd/src/helper.php";

use App\Application\App;



$app = new App();
$app->start();

//try {

//
//    dd(DataLoader::fetch('https://jsonplaceholder.typicode.com/posts'));
//    dd(DataLoader::fetch('https://jsonplaceholder.typicode.com/comments'));
//} catch (Exception $exception) {
//    echo "Ошибка: " . $exception->getMessage();
//}


//
//
//try {
//    if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['query'])) {
//        $query = $_GET['query'];
//        if (strlen($query) < 3) {
//            echo "Введите минимум 3 символа для поиска.";
//        } else {
//            $stmt = $db_connect->prepare("
//                SELECT posts.title, comments.body
//                FROM comments
//                JOIN posts ON comments.postId = posts.id
//                WHERE comments.body LIKE :query
//            ");
//            $stmt->execute([':query' => '%' . $query . '%']);
//            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            foreach ($results as $result) {
//                echo "<h2>{$result['title']}</h2>";
//                echo "<p>{$result['body']}</p>";
//            }
//        }
//    }
//} catch (PDOException $exception) {
//    echo "Ошибка: " . $exception->getMessage();
//}
//?>
<!---->
<!--<form method="GET" action="index.php">-->
<!--    <input type="text" name="query" placeholder="Введите текст комментария">-->
<!--    <button type="submit">Найти</button>-->
<!--</form>-->