<?php

class Landing extends Controller
{
    public function __construct()
    {
        //$this->testModel = $this->model('TestModel');
    }


    public function index()
    {   //data example
        $data = [
            'title' => 'Welcome',
        ];
        $this->view('landing/index', $data);
    }
    
    public function about()
    {
        $this->view('landing/about');
    }
}