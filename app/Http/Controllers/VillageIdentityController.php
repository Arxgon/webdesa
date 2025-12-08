<?php

namespace App\Http\Controllers;

use App\Models\VillageIdentity;

class VillageIdentityController extends Controller
{
    /**
     * Landing page untuk identitas desa.
     */
    public function landing()
    {
        $identity = VillageIdentity::query()->latest('updated_at')->first();

        if (! $identity) {
            abort(404, 'Data desa belum tersedia.');
        }

        return view('villageidentity.landing', compact('identity'));
    }

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