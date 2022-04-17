<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\App;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Config;
class SettingsController extends Controller
{
    public function __invoke()
    {
        \Composer\InstalledVersions::getInstalledPackages();
        \Composer\InstalledVersions::getAllRawData();
        $environment = [
            'name' => config('app.name'),
            'time' => config('app.timezone'),
            'php' => phpversion(),
            'version' => app()->version(),
            'lang' => config('app.locale'),
            'session' => config('session.driver'),
            'cache' => config('cache.default'),
        ];
        $roles = Role::all();
    //    return  $students = json_decode(file_get_contents(storage_path() . "/composer.json"), true);
        return view('settings.index', compact(
            'roles',
            'environment'
        ));
    }

    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('role_or_permission:create_administrador')->only(['create','store']);
       // $this->middleware('role_or_permission:read_administrador')->only(['index','show']);
       // $this->middleware('role_or_permission:update_administrador')->only(['edit','update']);
       // $this->middleware('role_or_permission:delete_administrador')->only(['destroy']);
    }

    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

}
