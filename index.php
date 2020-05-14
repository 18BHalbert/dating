<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 1/14/2019
 * Time: 10:10 AM
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload
require_once('vendor/autoload.php');
require_once("model/data-layer.php");

session_start();

//Create an instance of the Base Class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function() {
    $view = new View;
    echo $view->render('views/home.html');
});


$f3->route('GET|POST /personalInformation', function($f3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        var_dump($_POST);

        $_SESSION['FirstName'] = $_POST(['FirstName']);
        $_SESSION['LastName'] = $_POST(['lastName']);
        $_SESSION['Age'] = $_POST(['Age']);
        $_SESSION['Gender'] = $_POST(['Gender']);
        $_SESSION['Number'] = $_POST(['Number']);
    }
    $view = new View;
    echo $view->render('views/personalInformation.html');
});
$f3->route('GET|POST /profile', function($f3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['Email'] = $_POST(['Email']);
        $_SESSION['State'] = $_POST(['State']);
        $_SESSION['Seeking'] = $_POST(['Seeking']);
        $_SESSION['Biography'] = $_POST(['Biography']);
    }
    $view = new View;
    echo $view->render('views/profile.html');
});

$f3->route('GET /Interests', function($f3) {
    $InInterests = getInInterests();
    $OutInterests = getOutInterests();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['InDoor'] = $_POST(['InDoor']);
        $_SESSION['OutDoor'] = $_POST(['OutDoor']);
    }
    $f3->set('InInterests', $InInterests);
    $f3->set('OutInterests', $OutInterests);
    $view = new View;
    echo $view->render('views/interests.html');
});
$f3->route('GET /Summary', function() {
    $view = new View;
    echo $view->render('views/summary.html');
});
//Run fat free
$f3->run();