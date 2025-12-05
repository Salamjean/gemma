<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Repositories\Cashier\AssuranceRepository;
use Illuminate\Http\Request;

class AssuranceController extends Controller
{
    public function repository()
    {
        return new AssuranceRepository();
    }

    public function today()
    {
        return view('users.cashier.assurance.today', ['assurances' => $this->repository()->today()]);
    }

    public function history()
    {
        return view('users.cashier.assurance.history', ['assurances' => $this->repository()->history()]);
    }

}
