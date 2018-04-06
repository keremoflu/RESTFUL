<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;


//get all customers
$app->get('/api/customers', function (Request $request, Response $response){

    $sql = "SELECT * FROM customers";

    try{

        $db = new db();

        //connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($customers, JSON_UNESCAPED_UNICODE);

    }catch (PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});


//get single customer
$app->get('/api/customer/{id}', function (Request $request, Response $response){

    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM customers WHERE id = $id";

    try{

        $db = new db();

        //connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customer = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($customer);

    }catch (PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});


//add customer
$app->post('/api/customer/add', function (Request $request, Response $response){

    $user_name = $request->getParam('user_name');
    $user_job = $request->getParam('user_job');

    $sql = "INSERT INTO customers (user_name, user_job) VALUES (:user_name, :user_job)";

    try{

        $db = new db();

        //connect
        $db = $db->connect();

       $stmt = $db->prepare($sql);

       $stmt->bindParam(':user_name', $user_name);
       $stmt->bindParam(':user_job', $user_job);
       $stmt->execute();

       echo '{"notice: {"text": "Customer Added"}';

        $response->withHeader('Content-Type', 'application/json');
        return $response;

    }catch (PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }


});




//delete customer
$app->delete('/api/customer/delete/{id}', function (Request $request, Response $response){

    $id = $request->getAttribute('id');

    $sql = "DELETE FROM customers WHERE id = $id";

    try{

        $db = new db();

        //connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db=null;

        echo '{"notice: {"text": "Customer Deleted"}';


    }catch (PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }


});


?>