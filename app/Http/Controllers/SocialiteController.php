<?php

namespace App\Http\Controllers;

use App\Models\Socialite as ModelsSocialite;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialiteController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $findUser = User::where('google_id', $user->id)->first();

        if ($findUser) {
            Auth::login($findUser);
            return redirect('/admin/dashboard');
        } else {
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            $new_user->google_id = $user->id;
            $new_user->password = bcrypt('@@Bladepro@123@@');
            $new_user->save();
            Auth::login($new_user);

            return redirect('/admin/dashboard');
        }
    }
}
