<?php

namespace CRUD\Controller;

use CRUD\Helper\PersonHelper;
use CRUD\Model\Actions;
use CRUD\Model\Person;

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
        $personHelper = new PersonHelper();
        $person = new Person();
        $person->setFirstName($request["firstName"]);
        $person->setLastName($request["lastName"]);
        $person->setUsername($request["username"]);

        if (empty($firstname) && empty($lastname) && empty($username)) {
            echo "Required fields are empty.";
        } else {
            if ($personHelper->insert($person)) {
                echo "New record added successfully.";
            } else
                echo "Error adding record.";
                exit();
        }

    }

    public function updateAction($request)
    {
        $personHelper = new PersonHelper();
        $person = new Person();
        $person->setFirstName($request["firstName"]);
        $person->setLastName($request["lastName"]);
        $person->setUsername($request["username"]);

        if (empty($firstname) && empty($lastname) && empty($username)) {
            echo "Required fields are empty.";
        } else {
            if ($personHelper->update($person)) {
                echo "Record updated successfully.";
            } else
                echo "Error updating record.";
                exit();
        }
    }

    public function readAction($request)
    {
        $personHelper = new PersonHelper();
        $id = $request['firstName'];

        if (empty($id)) {
            echo "Required field is empty.";
        } else {
            if ($personHelper->fetch($id)) {
                echo "Success";
            } else {
                echo "rows: 0";
                exit();
            }
        }
    }

    public function readAllAction($request)
    {
        $personHelper = new PersonHelper();
        if ($personHelper->fetchAll()) {
            echo "Success";
        } else {
            echo "rows: 0";
            exit();
        }
    }

    public function deleteAction($request)
    {
        $personHelper = new PersonHelper();
        $username = $request['firstName'];

        if (empty($username)) {
            echo "Required field is empty.";
        } else {
            if ($personHelper->delete($username)) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record.";
                exit();
            }
        }
    }

}