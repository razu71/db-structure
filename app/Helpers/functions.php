<?php

if(!function_exists('getAdminSetting')) {
    function getAdminSetting($key) {
        return \App\Models\AdminSetting::where('key', $key)->first()->value;
    }
}

if(!function_exists('humanDateFormat')) {
    function humanDateFormat($date) {
        return date("M j, Y", strtotime($date));
    }
}