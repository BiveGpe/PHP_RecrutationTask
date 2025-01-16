<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filePath = $request->file('file')->store('uploads', 'public');

        Submission::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'file_path' => $filePath,
        ]);

        return back()->with('success', 'Formularz został przesłany pomyślnie!');
    }
}
