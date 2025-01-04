<?php

namespace App\Http\Controllers\Settings\SiteSettings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SiteSettingsController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view(
            'admin.settings.index',
            [
                'user' => $user,
            ]
        );
    }
}
