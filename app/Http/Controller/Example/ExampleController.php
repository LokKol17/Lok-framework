<?php

namespace Lok\Framework\Http\Controller\Example;

class ExampleController
{

    public function index(): string
    {
        return view('example');
    }
}