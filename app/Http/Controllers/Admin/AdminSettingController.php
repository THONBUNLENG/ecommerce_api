<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class AdminSettingController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => Config::get('app.name', 'Looma'),
            'site_description' => '',
            'site_email' => Config::get('mail.from.address', ''),
            'currency' => '$',
            'free_shipping_threshold' => 50,
            'tax_rate' => 10,
            'logo' => '',
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:500',
            'site_email' => 'required|email',
            'currency' => 'required|string|max:3',
            'free_shipping_threshold' => 'required|numeric|min:0',
            'tax_rate' => 'required|numeric|min:0|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('settings', 'public');
            $validated['logo'] = $path;
        }

        foreach ($validated as $key => $value) {
            Cache::put("setting.{$key}", $value, now()->addDays(30));
        }

        return redirect()->route('panel.settings.index')->with('success', 'Settings updated successfully.');
    }
}
