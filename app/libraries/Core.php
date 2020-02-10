<?php

//Core class to create urls and loading core controller in format - /controller/method/params

class Core
{
    protected $currentController = 'Landing';
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct()
    {
        //get the url
        $url = $this->getUrl();
        //check for file for first value of url
        if (file_exists('../app/controllers/' . ucwords($url[0]) . ".php")) {
            //set controller and unset
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        //require controller
        require_once '../app/controllers/' . $this->currentController . ".php";
        //instantiate
        $this->currentController = new $this->currentController;

        //check and get method
        if (isset($url[1])) {
            //if method exists in the current controller
            if (method_exists($this->currentController, $url[1]))
            {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        //get any params
        $this->params = $url ? array_values($url) : [''];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
