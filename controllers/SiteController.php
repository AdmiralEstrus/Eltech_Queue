<?php
include_once __DIR__ . "/../components/Controller.php";

//include_once __DIR__ . "/../models/FindUserUrl.php";

class SiteController extends Controller
{
    public function actionIndex()
    {
        $db = new DbConnection();
        $currentNumber = $db->findOne(1);

        if (isset($_POST['next'])) {
            $currentNumber++;
            $db->update($currentNumber);
        }

        if (isset($_POST['reset'])) {
            $currentNumber = 0;
            $db->update($currentNumber);
        }

        $this->view->generate(__DIR__ . "/../views/index.php", $currentNumber);
        var_dump("123");
        return true;
    }
}