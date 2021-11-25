<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\PublicationState;
use Carbon\Carbon;

class HomePage extends Controller
{
    public function index()
    {
        $date = Carbon::now();
        $date->timezone(new \DateTimeZone('UTC'));
        $date->subDays(5);
        $state = PublicationState::where('slug', 'PUB')->get()[0];
        $practices = Practice::where([
            ['publication_state_id', $state->id],
            ['updated_at', '<=', $date->toDateTimeString()],
        ])->paginate(3);

        return view('homepage')->with(['practices' => $practices]);
    }
}
