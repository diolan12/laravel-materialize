<?php
namespace App\Http\Controllers;

use App\Http\BaseControllers\DashboardController;
use Illuminate\Http\Request;

class StatsController extends DashboardController
{
    public function index()
    {
        $this->overrideTitle('Chart.js');
        return $this->render('stats.index');
    }

}