<?php
namespace App\Http\Controllers;

use App\Http\BaseControllers\DashboardController;
use Illuminate\Http\Request;

class TableController extends DashboardController
{
    public function tabulator()
    {
        $this->overrideTitle('Tabulator.js');
        return $this->render('table.tabulator');
    }

    public function datatablePHP()
    {
        $this->overrideTitle('Datatables PHP');
        return $this->render('table.datatable-php');
    }

    public function datatableJS()
    {
        $this->overrideTitle('Datatables JS');
        return $this->render('table.datatable-js');
    }

}