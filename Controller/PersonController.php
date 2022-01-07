<?php

namespace CRUD\Controller;

use CRUD\Model\Actions;

class PersonController
{
    public function switcher($uri,$request)
    {
        switch ($uri)
        {
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

    }

    public function updateAction($request)
    {

    }

    public function readAction($request)
    {

    }
    public function readAllAction($request)
    {

    }

    public function deleteAction($request)
    {

    }

}