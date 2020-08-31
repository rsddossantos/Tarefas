<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //definição para controller que não tem nenhuma action, equivalente ao INDEX
    public function __invoke()
    {
        return view('welcome');
    }

}
