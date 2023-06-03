<?php
namespace App\Http\Controllers;

use App\Http\BaseControllers\DashboardController;
use Illuminate\Http\Request;

class StatsController extends DashboardController
{
    public function index()
    {
        $this->overrideTitle('Materialize Framework');
        return $this->render('stats.index');
    }

    public function about()
    {
        $this->setSubtitle('About');
        return $this->render('about.index');
    }
}