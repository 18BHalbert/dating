<?php

class Controller{
    private $_f3; //router
    private $_validator; //validation object

    public function __construct($f3, $validator){
        $this->_f3 = $f3;
        $this->  _validator = $validator;
    }

    public function home(){
        $view = new template();
        echo $view->render('views/home.html');
    }

    public function personalInformation(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_SESSION['FirstName'] = $_POST(['FirstName']);
            $_SESSION['LastName'] = $_POST(['lastName']);
            $_SESSION['Age'] = $_POST(['Age']);
            $_SESSION['Gender'] = $_POST(['Gender']);
            $_SESSION['Number'] = $_POST(['Number']);
        }
        var_dump($_POST);
        $this->_f3->set('FirstName', $_POST['FirstName']);
        $view = new View;
        echo $view->render('views/personalInformation.html');
    }

    public function profile(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['Email'] = $_POST(['Email']);
            $_SESSION['State'] = $_POST(['State']);
            $_SESSION['Seeking'] = $_POST(['Seeking']);
            $_SESSION['Biography'] = $_POST(['Biography']);
        }
        $view = new View;
        echo $view->render('views/profile.html');
    }

    public function interests(){
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
    }

    public function summary(){
        $view = new View;
        echo $view->render('views/summary.html');
        session_destroy();
    }
}