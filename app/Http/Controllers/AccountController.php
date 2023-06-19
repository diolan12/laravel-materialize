<?php
namespace App\Http\Controllers;

use App\Http\BaseControllers\DashboardController;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends DashboardController
{
    public function index()
    {
        $this->setSubtitle('Accounts');
        $data = User::all();
        $this->setData('users', $data);
        return $this->render('account.index');
    }

}