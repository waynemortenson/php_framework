<?php

class Landing extends Controller
{
    public function __construct()
    {
        $this->testModel = $this->model('TestModel');
    }


    public function index()
    {
        $this->view('landing/index');
    }
    
    public function about()
    {
        $this->view('landing/about');
    }
}