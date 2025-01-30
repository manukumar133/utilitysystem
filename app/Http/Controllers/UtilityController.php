<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use getID3;
class UtilityController extends Controller
{
    public function audio()
    {
        return view('audio');
    }



    public function checkAudioDuration(Request $request)
    {
        $request->validate([
            'audio' => 'required|mimes:mp3,wav,aac,flac|file'
        ]);

        $audioPath = $request->file('audio')->getRealPath();

        try {
            $getID3 = new getID3;

            $audioInfo = $getID3->analyze($audioPath);

            if (isset($audioInfo['playtime_seconds'])) {
                $durationInSeconds = $audioInfo['playtime_seconds'];

                $duration = gmdate("H:i:s", $durationInSeconds);

                return back()->with('success', 'Audio Duration: ' . $duration);
            } else {
                return back()->with('error', 'Could not calculate audio duration. Duration data not available.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while processing the audio file: ' . $e->getMessage());
        }
    }



    public function distance()
    {
        return view('distance');
    }

    public function calculateDistance(Request $request)
    {
        $request->validate([
            'latitude1' => 'required|numeric',
            'longitude1' => 'required|numeric',
            'latitude2' => 'required|numeric',
            'longitude2' => 'required|numeric',
        ]);

        $lat1 = deg2rad($request->latitude1);
        $lon1 = deg2rad($request->longitude1);
        $lat2 = deg2rad($request->latitude2);
        $lon2 = deg2rad($request->longitude2);

        $earthRadius = 6371;

        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;

        $a = sin($dlat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dlon / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c;

        return back()->with('success', 'Distance: ' . round($distance, 2) . ' km');
    }
}
