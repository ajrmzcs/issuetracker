<?php

namespace App\Http\Controllers;



use Illuminate\View\View;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('statuses.index');
    }
}
