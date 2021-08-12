<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    //

    public function navbarSetting(Request $request)
    {
        # code...
        // dd($request->all());

        $settings =[];
        $settings['skin'] = $request->skinradio;
        $settings['layoutWidth'] = $request->layoutWidth;
        $settings['navColor'] = $request->navColor;
        $settings['navType'] = $request->navType;
        $settings['footerType'] = $request->footerType;
        $settings['collapse_sidebar'] = false;
        
        if($request->has('collapsesidebarswitch')){
            $settings['collapse_sidebar'] = true;
        
        }
        // dd($settings);
        // dd(json_encode($request->all()));
        // SiteSettings::create($request);
        SiteSettings::updateOrCreate(
            ['name'=>'nav_bar'],
            [
            'name' => 'nav_bar',
            'value' =>json_encode($settings)
        ]
    );
        return redirect()->back();
        // dd();
    }
}
