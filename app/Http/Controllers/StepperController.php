<?php

namespace App\Http\Controllers;

use App\Helpers\JsonStd;
use App\Http\BaseControllers\DashboardController;
use App\Models\User;
use Illuminate\Http\Request;

class StepperController extends DashboardController
{
    public function index()
    {
        $this->setSubtitle('Stepper');
        return $this->render('stepper.index');
    }

    public function checkEmail(Request $request)
    {
        try {
            $email = $request->post('email');
            $data = User::where('email', $email)->first();
            if ($data == null) {
                return JsonStd::error($email, 'Email not match');
            }
            return JsonStd::successMsg('Email match');
        } catch (\Throwable $th) {
            return JsonStd::error($th);
        }
    }
}
