<?php
namespace App\Http\Controllers;

use App\Http\BaseControllers\DashboardController;
use Illuminate\Http\Request;

class TableController extends DashboardController
{
    public function index()
    {
        $this->overrideTitle('Tabulator.js');
        return $this->render('table.index');
    }

}