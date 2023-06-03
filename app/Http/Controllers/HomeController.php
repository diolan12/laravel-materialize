<?php
namespace App\Http\Controllers;

use App\Http\BaseControllers\PublicController;
use Illuminate\Http\Request;

class HomeController extends PublicController
{
    public function index()
    {
        $this->overrideTitle('Buana Cahaya Mentari');
        return $this->render('home.index');
    }

    public function about()
    {
        $this->setSubtitle('About');
        return $this->render('about.index');
    }
}