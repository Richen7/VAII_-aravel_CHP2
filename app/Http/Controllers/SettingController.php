<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function create()
    {
        // Vytvorenie nového záznamu v tabuľke
        Setting::query()->create(['name' => 'Age of Sigmar', 'Short' => 'AOS']);
        Setting::query()->create(['name' => 'Fantasy', 'Short' => 'FB']);
        Setting::query()->create(['name' => '40 thousand', 'Short' => '40K']);

        return 'Tabuľka Settingov(prostredí) bola úspešne vytvorená s hodnotami.';
    }
    public function delete()
    {
        Setting::truncate();

        return 'Tabuľka nastavení bola úspešne vyčistená.';
    }
}
