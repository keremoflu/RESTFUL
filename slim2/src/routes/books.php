<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;


//get all books
$app->get('/api/books', function (Request $request, Response $response){

    $sql = "SELECT * FROM books_active";

    try{

        $db = new db();

        //connect
        $db = $db->connect();

        //pdo
        $stmt = $db->query($sql);
        $books = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($books, JSON_UNESCAPED_UNICODE);

    }catch (PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

//get 'queryParam' books
$app->get('/api/books/search', function (Request $request, Response $response){

    //history, computer,art etc...

    $param = $request->getQueryParam('book_type',null);

    $sql = "SELECT * FROM books_active WHERE book_type = :booktype";

    try{

        $db = new db();

        //connect
        $db = $db->connect();

        //pdo
        $stmt = $db->prepare($sql);
        $stmt->execute(array(':booktype' => $param));
        $books = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($books, JSON_UNESCAPED_UNICODE);

    }catch (PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});



//add book
$app->post('/api/books/add', function (Request $request, Response $response){

    $book_name = $request->getParam('book_name');
    $book_writer = $request->getParam('book_writer');
    $book_photo = $request->getParam('book_photo');
    $book_rating = $request->getParam('book_rating');
    $book_type = $request->getParam('book_type');
    $book_content = $request->getParam('book_content');

    $sql = "INSERT INTO books_active (book_name, book_writer, book_photo, book_rating, book_type, book_content) VALUES (:book_name, :book_writer, :book_photo, :book_rating, :book_type, :book_content)";

    try{

       $db = new db();

        //connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':book_name', $book_name);
        $stmt->bindParam(':book_writer', $book_writer);
        $stmt->bindParam(':book_photo', $book_photo);
        $stmt->bindParam(':book_rating', $book_rating);
        $stmt->bindParam(':book_type', $book_type);
        $stmt->bindParam(':book_content', $book_content);
        $stmt->execute();

        echo '{"notice: {"text": "Book Added"}';

        $response->withHeader('Content-Type', 'application/json');
        return $response;

    }catch (PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }


});


//get popular books - with rating 4 and 5
$app->get('/api/books/popular', function (Request $request, Response $response){

    $sql = "SELECT * FROM books_active WHERE book_rating IN (:book_rating_1, :book_rating_2)";

    try{

        $db = new db();

        //connect
        $db = $db->connect();

        //pdo
        $stmt = $db->prepare($sql);
        $stmt->execute(array(':book_rating_1' => 4, ':book_rating_2' => 5));
        $books = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($books, JSON_UNESCAPED_UNICODE);

    }catch (PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

