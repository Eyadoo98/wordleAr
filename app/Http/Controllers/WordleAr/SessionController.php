<?php

namespace App\Http\Controllers\WordleAr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function setSession(Request $request)
    {


        $date = date('Y-m-d');

        $currentDate = now()->format('Y-m-d');

        $isToday = '';
        if ($date === $currentDate) {
            $isToday = 'today';
        } else {
            $isToday = 'not_today';
        }
        // Storing JSON object in session
        $jsonObject = [
            'words' => $request->words,
            'date' => $isToday,
            'colors'=>$request->colors
        ];
        // Convert the array to JSON
        $jsonString = json_encode($jsonObject);

        session(['jsonObject' => $jsonString]);

        // Retrieving JSON object from session
        $retrievedJsonString = session('jsonObject');

        // Convert the JSON string back to an array
        $retrievedJsonObject = json_decode($retrievedJsonString, true);

        return $retrievedJsonObject;


//        $arrChar = $request->words;
//        Session::put('user_inputs', $jsonObject);
//
//        $getSessionData = Session::get('user_inputs');
//
//        if (isset($getSessionData) && !empty($getSessionData)){
//            return $getSessionData;
////            return 'session_set';
//        }

//        *****************************************
//        return $request->arrChar;
//        $date = date('Y-m-d');

//        Session::put('last_visit_date', $date);

//        $sessionDate = Session::get('last_visit_date');

//        $currentDate = now()->format('Y-m-d');

//        if ($sessionDate === $currentDate) {
//            return 'session_set';
//        } else {
//            return 'session_not_set';
//        }
    }

    public function getSession(Request $request)
    {
        // Retrieving JSON object from session
        $retrievedJsonString = session('jsonObject');
        // Convert the JSON string back to an array
        $retrievedJsonObject = json_decode($retrievedJsonString, true);
//        $retrievedJsonObject = json_decode($getSessionData, true);
        return $retrievedJsonObject;
//        if (isset($getSessionData) && !empty($getSessionData)) {
//            return $retrievedJsonObject;
//        } else {
//            return response()->json(['message' => 'session_not_set']);
//        }
    }

}
