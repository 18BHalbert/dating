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
require_once("model/validate.php");
//require_once("controllers/controller.php");

session_start();

//Create an instance of the Base Class
$f3 = Base::instance();
//$validator = new Validate();
//$controller = new Controller($f3, $validator);

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function() {
    $view = new template();
    echo $view->render('views/home.html');
});


$f3->route('GET|POST /personalInformation', function($f3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //var_dump($_POST);
        if (!validFName($_POST['FirstName'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["FirstName"]', "Invalid First Name.");
        }
        if (!validLName($_POST['LastName'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["LastName"]', "Invalid Last Name.");
        }
        if (!validAge($_POST['Age'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["Age"]', "Invalid Age.");
        }
        if (!validPhone($_POST['Number'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["Number"]', "Invalid Number.");
        }

        if(empty($f3->GET('errors'))){
            $_SESSION['FirstName'] = $_POST(['FirstName']);
            $_SESSION['LastName'] = $_POST(['LastName']);
            $_SESSION['Age'] = $_POST(['Age']);
            $_SESSION['Gender'] = $_POST(['Gender']);
            $_SESSION['Number'] = $_POST(['Number']);
        }

    }
    $f3->set('FirstName', $_POST['FirstName']);
    $view = new View;
    echo $view->render('views/personalInformation.html');
});

$f3->route('GET|POST /profile', function($f3) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (!validEmail($_POST['Email'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["Email"]', "Invalid Email.");
        }

        if(empty($f3->GET('errors'))) {
            $_SESSION['Email'] = $_POST(['Email']);
            $_SESSION['State'] = $_POST(['State']);
            $_SESSION['Seeking'] = $_POST(['Seeking']);
            $_SESSION['Biography'] = $_POST(['Biography']);
        }
    }
    $view = new View;
    echo $view->render('views/profile.html');
});

$f3->route('GET /Interests', function($f3) {
    $InInterests = getInInterests();
    $OutInterests = getOutInterests();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (!validOutdoor($_POST['OutInterests'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["Outdoor"]', "Invalid Interests.");
        }

        if (!validIndoor($_POST['InInterests'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["Outdoor"]', "Invalid Intersts.");
        }

        if(empty($f3->GET('errors'))){
            $_SESSION['InDoor'] = $_POST(['InDoor']);
            $_SESSION['OutDoor'] = $_POST(['OutDoor']);
        }
    }
    $f3->set('InInterests', $InInterests);
    $f3->set('OutInterests', $OutInterests);
    $view = new View;
    echo $view->render('views/interests.html');
});
$f3->route('GET /Summary', function() {
    $view = new View;
    echo $view->render('views/summary.html');
    session_destroy();
});
//Run fat free
$f3->run();