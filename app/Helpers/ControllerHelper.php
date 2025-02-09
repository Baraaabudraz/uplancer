<?php

namespace App\Helpers;

class ControllerHelper {
    public static function generateResponse($icon,$text,$status)
    {
        return response()->json([
            'icon' => $icon,
            'text' => $text,
        ],$status);

    }
}
