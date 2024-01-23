<?php

namespace App\Http\Controllers\WordleAr;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;

//use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{

    private function canPlayGame($user)
    {
        // Check if the user has never played before
        if ($user->last_played_at === null) {
            $user->is_played = 'played';
            return true;
        }
        $user->is_played = 'not_played';
        // Check if the last play date is different from the current date
        return Carbon::parse($user->last_played_at)->isBefore(Carbon::today());
    }

    public function saveToDatabase(Request $request)
    {
        $user = auth()->user();
        $user->words = $request->words;
        $user->colors = $request->colors;
        $user->date = 'today';

        $user->userPlays = $user->userPlays + 1;

        if($request->is_win){
//            $user->is_played = 'played';
            $user->currentStrike = $user->currentStrike + 1;
            $user->maxStrike = max($user->maxStrike, $user->currentStrike);
            $numberOfRow = count($user->words) / 5;
            $user->numberOfRow = $numberOfRow;
            switch ($numberOfRow) {
                case 1:
                    $user->countRowWin1 = $user->countRowWin1 + 1;
                    $user->countRowWin = $user->countRowWin + 1;
                    break;
                case 2:
                    $user->countRowWin2 = $user->countRowWin2 + 1;
                    $user->countRowWin = $user->countRowWin + 1;
                    break;
                case 3:
                    $user->countRowWin3 = $user->countRowWin3 + 1;
                    $user->countRowWin = $user->countRowWin + 1;
                    break;
                case 4:
                    $user->countRowWin4 = $user->countRowWin4 + 1;
                    $user->countRowWin = $user->countRowWin + 1;
                    break;
                case 5:
                    $user->countRowWin5 = $user->countRowWin5 + 1;
                    $user->countRowWin = $user->countRowWin + 1;
                    break;
                case 6:
                    $user->countRowWin6 = $user->countRowWin6 + 1;
                    $user->countRowWin = $user->countRowWin + 1;
                    break;
            }
        }else{
            $user->currentStrike = 0;
//            $user->is_played = 'not_played';
            $user->is_played = 'played';
        }
        $user->win = floor(($user->countRowWin / $user->userPlays) * 100);

        // Check if the user has played today
        if ($this->canPlayGame($user)) {
            // Update the last played timestamp
            $user->update(['last_played_at' => now()]);
        }

        $user->save();

        $getUser = User::query()->where('id', $user->id)->first();



        return json_decode($getUser);

    }

    public function setSession(Request $request)
    {

//        check if user is logged in
        if (Auth::check()) {

            return $this->saveToDatabase($request);
        } else {
            //userPlays cookie
            if (!isset($_COOKIE['userPlays'])) {
                // If not set, create the cookie with an initial value of 1
                $userPlays = 1;
            } else {
                // If the cookie is set, retrieve the current value and increment it
                $userPlays = $_COOKIE['userPlays'] + 1;
            }
            setcookie('userPlays', $userPlays, time() + 31536000, '/');
            //userPlays cookie

            //maxStrike cookie
            if (!isset($_COOKIE['val1'])) {
                // If not set, create the cookie with an initial value of 1
                $val1 = 0;
            } else {
                // If the cookie is set, retrieve the current value and increment it
                $val1 = $_COOKIE['val1'];
            }
            setcookie('val1', $val1, time() + 31536000, '/');


            if (!isset($_COOKIE['val2'])) {
                // If not set, create the cookie with an initial value of 1
                $val2 = 0;
            } else {
                // If the cookie is set, retrieve the current value and increment it
                $val2 = $_COOKIE['val2'];
            }
            setcookie('val2', $val2, time() + 31536000, '/');

            if (isset($request->is_win)) {
                $is_win = true;

                //currentStrike cookie
                if (!isset($_COOKIE['currentStrike'])) {
                    // If not set, create the cookie with an initial value of 1
                    $currentStrike = 1;
                } else {
                    // If the cookie is set, retrieve the current value and increment it
                    $currentStrike = $_COOKIE['currentStrike'] + 1;
                }
                setcookie('currentStrike', $currentStrike, time() + 31536000, '/');

                //currentStrike cookie

                if (!isset($_COOKIE['val1'])) {
                    // If not set, create the cookie with an initial value of 1
                    $val1 = 1;
                } else {
                    // If the cookie is set, retrieve the current value and increment it
                    $val1 = $_COOKIE['val1'] + 1;
                }
                setcookie('val1', $val1, time() + 31536000, '/');
                //val1 cookie

            } else {
                $is_win = false;

                //currentStrike cookie
                $currentStrike = 0;
                setcookie('currentStrike', $currentStrike, time() + 31536000, '/');
                //currentStrike cookie

//            maxStrike cookie
                $val2 = $val1;
                $val1 = 0;
                setcookie('val1', $val1, time() + 31536000, '/');
                setcookie('val2', $val2, time() + 31536000, '/');
//            maxStrike cookie

            }

            $maxStrike = max($val1, $val2);
            setcookie('maxStrike', $maxStrike, time() + 31536000, '/');

            $date = date('Y-m-d');

            $currentDate = now()->format('Y-m-d');

//        return $date . " ". $currentDate;
            $isToday = '';

            if ($date === $currentDate) {
                $isToday = 'today';
            } else {
                $isToday = 'not_today';
            }


            if ($this->hasPlayedToday()) {
                // User has already played today
                $is_played = 'not_played';
            } else {
                // User hasn't played today, perform the game logic here...

                // Set the cookie to indicate that the user has played today
                $this->setPlayedTodayCookie();

                // Return the game response
                $is_played = 'played';
            }
            // Storing JSON object in session
            $jsonObject = [
                'words' => $request->words,
                'date' => $isToday,
                'is_played' => $is_played,
                'colors' => $request->colors,
                'userPlays' => $userPlays,
                'is_win' => $is_win,
                'maxStrike' => $maxStrike,
                'currentStrike' => $currentStrike,
            ];
            // Convert the array to JSON
            $jsonString = json_encode($jsonObject);

            // Convert the JSON string back to an array
            if ($jsonObject['is_win'] === true) {
                $numberOfRow = count($jsonObject['words']) / 5;
                $jsonObject['numberOfRow'] = $numberOfRow;

                if (!isset($_COOKIE['countRowWin1'])) {
                    // If not set, create the cookie with an initial value of 1
                    $countRowWin1 = 0;
                } else {
                    // If the cookie is set, retrieve the current value and increment it
                    $countRowWin1 = $_COOKIE['countRowWin1'];
                }

                if (!isset($_COOKIE['countRowWin2'])) {
                    // If not set, create the cookie with an initial value of 1
                    $countRowWin2 = 0;
                } else {
                    // If the cookie is set, retrieve the current value and increment it
                    $countRowWin2 = $_COOKIE['countRowWin2'];
                }

                if (!isset($_COOKIE['countRowWin3'])) {
                    // If not set, create the cookie with an initial value of 1
                    $countRowWin3 = 0;
                } else {
                    // If the cookie is set, retrieve the current value and increment it
                    $countRowWin3 = $_COOKIE['countRowWin3'];
                }

                if (!isset($_COOKIE['countRowWin4'])) {
                    // If not set, create the cookie with an initial value of 1
                    $countRowWin4 = 0;
                } else {
                    // If the cookie is set, retrieve the current value and increment it
                    $countRowWin4 = $_COOKIE['countRowWin4'];
                }

                if (!isset($_COOKIE['countRowWin5'])) {
                    // If not set, create the cookie with an initial value of 1
                    $countRowWin5 = 0;
                } else {
                    // If the cookie is set, retrieve the current value and increment it
                    $countRowWin5 = $_COOKIE['countRowWin5'];
                }

                if (!isset($_COOKIE['countRowWin6'])) {
                    // If not set, create the cookie with an initial value of 1
                    $countRowWin6 = 0;
                } else {
                    // If the cookie is set, retrieve the current value and increment it
                    $countRowWin6 = $_COOKIE['countRowWin6'];
                }
                switch ($numberOfRow) {
                    case 1:
                        $countRowWin1 = $countRowWin1 + 1;
                        setcookie('countRowWin1', $countRowWin1, time() + 31536000, '/');
                        break;
                    case 2:
                        $countRowWin2 = $countRowWin2 + 1;
                        setcookie('countRowWin2', $countRowWin2, time() + 31536000, '/');
                        break;
                    case 3:
                        $countRowWin3 = $countRowWin3 + 1;
                        setcookie('countRowWin3', $countRowWin3, time() + 31536000, '/');
                        break;
                    case 4:
                        $countRowWin4 = $countRowWin4 + 1;
                        setcookie('countRowWin4', $countRowWin4, time() + 31536000, '/');
                        break;
                    case 5:
                        $countRowWin5 = $countRowWin5 + 1;
                        setcookie('countRowWin5', $countRowWin5, time() + 31536000, '/');
                        break;
                    case 6:
                        $countRowWin6 = $countRowWin6 + 1;
                        setcookie('countRowWin6', $countRowWin6, time() + 31536000, '/');
                        break;
                }
            }

            if (isset($_COOKIE['jsonObject'])) {

                if (isset($_COOKIE['countRowWin1'])) {
                    $jsonObject['countRowWin1'] = $_COOKIE['countRowWin1'];
                }
                if (isset($_COOKIE['countRowWin2'])) {
                    $jsonObject['countRowWin2'] = $_COOKIE['countRowWin2'];
                }
                if (isset($_COOKIE['countRowWin3'])) {
                    $jsonObject['countRowWin3'] = $_COOKIE['countRowWin3'];
                }
                if (isset($_COOKIE['countRowWin4'])) {
                    $jsonObject['countRowWin4'] = $_COOKIE['countRowWin4'];
                }
                if (isset($_COOKIE['countRowWin5'])) {
                    $jsonObject['countRowWin5'] = $_COOKIE['countRowWin5'];
                }
                if (isset($_COOKIE['countRowWin6'])) {
                    $jsonObject['countRowWin6'] = $_COOKIE['countRowWin6'];
                }
            }


            $countRowWin = 0;

            if (isset($countRowWin1) && !empty($countRowWin1)) {
                $jsonObject['countRowWin1'] = $countRowWin1;
                $countRowWin += $countRowWin1;
                setcookie('countRowWin', $countRowWin, time() + 31536000, '/');
            }
            if (isset($countRowWin2) && !empty($countRowWin2)) {
                $jsonObject['countRowWin2'] = $countRowWin2;
                $countRowWin += $countRowWin2;
                setcookie('countRowWin', $countRowWin, time() + 31536000, '/');

            }
            if (isset($countRowWin3) && !empty($countRowWin3)) {
                $jsonObject['countRowWin3'] = $countRowWin3;
                $countRowWin += $countRowWin3;
                setcookie('countRowWin', $countRowWin, time() + 31536000, '/');

            }
            if (isset($countRowWin4) && !empty($countRowWin4)) {
                $jsonObject['countRowWin4'] = $countRowWin4;
                $countRowWin += $countRowWin4;
                setcookie('countRowWin', $countRowWin, time() + 31536000, '/');

            }
            if (isset($countRowWin5) && !empty($countRowWin5)) {
                $jsonObject['countRowWin5'] = $countRowWin5;
                $countRowWin += $countRowWin5;
                setcookie('countRowWin', $countRowWin, time() + 31536000, '/');

            }
            if (isset($countRowWin6) && !empty($countRowWin6)) {
                $jsonObject['countRowWin6'] = $countRowWin6;
                $countRowWin += $countRowWin6;
                setcookie('countRowWin', $countRowWin, time() + 31536000, '/');

            }

            if ($countRowWin == 0 && isset($_COOKIE['countRowWin'])) {
                $countRowWin = $_COOKIE['countRowWin'];
            }
            setcookie('countRowWin', $countRowWin, time() + 31536000, '/');

            $jsonObject['win'] = floor(($countRowWin / $jsonObject['userPlays']) * 100);

            $jsonString = json_encode($jsonObject);
            setcookie('jsonObject', $jsonString, time() + 31536000, '/');
            return $jsonObject;
        }

    }

    function hasPlayedToday(): bool
    {
        return isset($_COOKIE['played_today']) && $_COOKIE['played_today'] === date('Y-m-d');
    }

    // Function to set the cookie indicating that the user has played today
    function setPlayedTodayCookie()
    {
        setcookie('played_today', date('Y-m-d'), strtotime('tomorrow'));
    }

    public function hasUserPlayedTodayDataBase($user)
    {
        // Retrieve the user with the last_played_at column
        $user = User::query()->find($user->id);

        // Check if last_played_at is set and it's today
        return $user->last_played_at && Carbon::parse($user->last_played_at)->isToday();
    }
    public function getCookies(Request $request)
    {

        if (Auth::check()) {
            $user = auth()->user();
            if ($this->hasUserPlayedTodayDataBase($user)) {
                $user_is_played = 'played';

            } else {
                $user_is_played = 'not_played';
            }
//
//            $user->update(['last_played_at' => now(),'is_played'=>$user->is_played]);
            $user->update(['is_played'=>$user_is_played]);

            $getUser = User::query()->where('id', $user->id)->first();
            return json_decode($getUser);
        }else{


        /***************/
        if (!isset($_COOKIE['jsonObject'])) {
            // If not set, create the cookie with an initial value of 1
            $retrievedJsonString = [];
        } else {
            if ($this->hasPlayedToday()) {
                // User has already played today
                $is_played = 'played';
                // Update $retrievedJsonString with the new value of is_played
                $retrievedJsonString = json_decode($_COOKIE['jsonObject'], true);
                $retrievedJsonString['is_played'] = $is_played;

                // Convert $retrievedJsonString back to JSON and set the cookie
                setcookie('jsonObject', json_encode($retrievedJsonString), time() + 86400, '/'); // Set the cookie for 1 day (adjust as needed)
            } else {
                // User hasn't played today, perform the game logic here...

                // Set the cookie to indicate that the user has played today
                $this->setPlayedTodayCookie();

                // Return the game response
                $is_played = 'not_played';
                // Update $retrievedJsonString with the new value of is_played
                $retrievedJsonString = json_decode($_COOKIE['jsonObject'], true);
                $retrievedJsonString['is_played'] = $is_played;

                // Convert $retrievedJsonString back to JSON and set the cookie
                setcookie('jsonObject', json_encode($retrievedJsonString), time() + 86400, '/'); // Set the cookie for 1 day (adjust as needed)
            }

            // If the cookie is set, retrieve the current value and increment it
            $retrievedJsonString = json_decode($_COOKIE['jsonObject'], true);
        }

            return $retrievedJsonString;
        }
    }

}
