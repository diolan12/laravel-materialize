<?php
namespace App\Http\Controllers;

use App\Http\BaseControllers\DashboardController;
use Illuminate\Http\Request;

class MapController extends DashboardController
{
    public function index()
    {
        $this->overrideTitle('Leaflet.js');
        return $this->render('map.index');
    }

}