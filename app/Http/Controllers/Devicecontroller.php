<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;

class DeviceController extends Controller
{
    public function show($id)
    {
        $device = Device::find($id);
        return view('tag.show', compact('tag'));
    }
}
