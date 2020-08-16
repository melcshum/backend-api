<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

        return view('gamedatas.index');
    }
}
