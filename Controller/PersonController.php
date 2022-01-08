<?php

namespace CRUD\Controller;

use CRUD\Helper\PersonHelper;
use CRUD\Model\Actions;

class PersonController
{
    public function switcher($uri, $request)
    {
        switch ($uri) {
            case Actions::CREATE:
                $this->createAction($request);
                break;
            case Actions::UPDATE:
                $this->updateAction($request);
                break;
            case Actions::READ:
                $this->readAction($request);
                break;
            case Actions::READ_ALL:
                $this->readAllAction($request);
                break;
            case Actions::DELETE:
                $this->deleteAction($request);
                break;
            default:
                break;
        }
    }

    public function createAction($request)
    {
        $array = [];
        $personHelper = new PersonHelper();
        $firstname = $_REQUEST($_POST['firstName']);
        $lastname = $_REQUEST($_POST['lastName']);
        $username = $_REQUEST($_POST['username']);

        if (empty($firstname) && empty($lastname) && empty($username)) {
            echo "Required fields are empty.";
        } else {
            array_push($array, $firstname, $lastname, $username);
            if ($personHelper->insert($array)) {
                echo "New record added successfully.";
            } else
                echo "Error";
        }

    }

    public function updateAction($request)
    {
        $array = [];
        $personHelper = new PersonHelper();
        $firstname = $_REQUEST($_POST['firstName']);
        $lastname = $_REQUEST($_POST['lastName']);
        $username = $_REQUEST($_POST['username']);

        if (empty($firstname) && empty($lastname) && empty($username)) {
            echo "Required fields are empty.";
        } else {
            array_push($array, $firstname, $lastname);
            if ($personHelper->update($username, $array)) {
                echo "Record updated successfully.";
            } else
                echo "Error updating record.";
        }
    }

    public function readAction($request)
    {
        $personHelper = new PersonHelper();
        $id = $_REQUEST($_GET['firstName']);

        if (empty($id)) {
            echo "Required field is empty.";
        } else {
            if ($personHelper->fetch($id)) {
                echo "";
            } else {
                echo "rows: 0";
            }
        }
    }

    public function readAllAction($request)
    {
        $personHelper = new PersonHelper();
        if ($personHelper->fetchAll()) {
            echo "";
        } else {
            echo "rows: 0";
        }
    }

    public function deleteAction($request)
    {
        $personHelper = new PersonHelper();
        $username = $_REQUEST($_POST['firstName']);

        if (empty($username)) {
            echo "Required field is empty.";
        } else {
            if ($personHelper->delete($username)) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record.";
            }
        }
    }

}