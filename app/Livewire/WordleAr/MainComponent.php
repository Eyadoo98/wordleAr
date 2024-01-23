<?php

namespace App\Livewire\WordleAr;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class MainComponent extends Component
{

    public $retrievedJsonString;
    public $retrievedJsonObject;
    public string $currentDate;
    public string $numberOfRow;
    public string $currentStrike;
    public string $maxStrike;
    public string $countRowWin1;
    public string $countRowWin2;
    public string $countRowWin3;
    public string $countRowWin4;
    public string $countRowWin5;
    public string $countRowWin6;


    public string $view = 'main';

    public function render(Request $request)
    {

        if (Auth::check()) {
            $user = auth()->user();
            $this->retrievedJsonString = User::query()->where('id', $user->id)->first();

        } else {


            if (!isset($_COOKIE['jsonObject'])) {
                // If not set, create the cookie with an initial value of 1
                $this->retrievedJsonString = [];
            } else {
                // If the cookie is set, retrieve the current value and increment it
                $this->retrievedJsonString = json_decode($_COOKIE['jsonObject']);
            }

//dd($this->retrievedJsonString->countRowWin1);
            $this->currentDate = Carbon::now()->format('F j, Y');
        }
        return view('livewire.wordle-ar.main-component');
    }

}
