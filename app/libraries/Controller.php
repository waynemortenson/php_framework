<?php

//controller to load the models and views

class Controller
{
    public function model($model)
    {   //require model file
        require_once '../app/models/' . $model . ".php";
        //init model
        return new $model();
    }

    //load view
    public function view($view)
    {   //check for the view file
        if(file_exists('../app/views/' . $view . '.php'))
        {   //require the view file if found
            require_once '../app/views/' .$view . '.php';
        }else
        {   //no view file found
            die('View does not exist');
        }
    }
}