<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class DashboardController extends Controller
{
    public function index(): Factory|View|Application
    {
        $submissions = Submission::all();

        return view('formData', compact('submissions'));
    }
}
