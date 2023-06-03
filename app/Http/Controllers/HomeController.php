<?php
namespace App\Http\Controllers;

use App\Http\BaseControllers\PublicController;
use Illuminate\Http\Request;

class HomeController extends PublicController
{
    public function index()
    {
        $this->overrideTitle('Materialize Framework');
        return $this->render('home.index');
    }

    public function about()
    {
        $this->setSubtitle('About');
        return $this->render('about.index');
    }
}