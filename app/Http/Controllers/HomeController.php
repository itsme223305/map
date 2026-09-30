<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getMap()
    {
        $problems = Problem::notMerged()->get();

        return view('pages.map', ['problems' => $problems]);
    }

    public function getHome()
    {
        return view('pages.home');
    }

    public function getTable()
    {
        return view('pages.table');
    }

    public function getPolitics()
    {
        return view('pages.politics');
    }

    public function getActors()
    {
        return view('pages.actors');
    }
}
