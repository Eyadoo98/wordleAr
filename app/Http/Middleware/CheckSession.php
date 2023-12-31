<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Livewire;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

//        Livewire::component('main-component', \App\Livewire\WordleAr\MainComponent::class);

//        $sessionDate = Session::get('last_visit_date');
//
//        $currentDate =  date('Y-m-d');
//
//        if ($sessionDate === $currentDate) {
//            return new response(view('partials.WordleAr.status'));
//        } else {
//            return $next($request);
//        }
        return $next($request);

    }
}
