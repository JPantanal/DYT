<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function index(Request $request): \Inertia\Response
    {
        return Inertia::render('Payments');
    }
}
