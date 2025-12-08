<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VillageProfileController extends Controller
{
      public function history()
    {
        return view('pages.history');
    }

    public function profileArea()
    {
        return view('pages.profile-area');
    }

    public function profilePotention()
    {
        return view('pages.profile-potention');
    }

    public function development()
    {
        return view('pages.development');
    }

    public function stall()
    {
        return view('pages.stall');
    }
}