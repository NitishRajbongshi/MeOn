<?php

namespace App\Http\Controllers\Settings\SiteSettings\MetaSettings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Standard\Standard;

class NoteMetaDataController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $standards = Standard::all(['id', 'name']);
        return view(
            'admin.settings.metaSettings.note',
            [
                'user' => $user,
                'classes' => $standards,
            ]
        );
    }
}
