<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StatistiekenController extends Controller
{
    public function index()
    {
        // Check of de gebruiker ingelogd is en admin is
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Je hebt geen toegang tot deze pagina.');
        }

        // Als admin → toon de view
        return view('/statistieken');
    }
}
