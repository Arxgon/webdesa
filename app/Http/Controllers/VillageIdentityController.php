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
}
