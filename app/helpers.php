<?php

if (!function_exists('university')) {

    function university()
    {
        return app('currentUniversity');
    }

}