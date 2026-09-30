<?php

if (!function_exists('get_problem_type')) {
    function get_problem_type($type_code)
    {
        $problemTypes = [
            'g-1' => 'sadnja drveća', // Green-area
            'g-2' => 'sadnja šiblja, cveća i drugog zelenila',
            'g-3' => 'rekonstrukcija/podizanje travnjaka',
            'g-4' => 'nega postojećih biljaka',
            'g-5' => 'uklanjanje bolesnih i starih stabala i samoniklih biljaka',
            'w-1' => 'uklanjanje divlje deponije', // Waste
            'w-2' => 'sanacija degradirane javne površine',
            'w-3' => 'sakupljanje i uklanjanje rasutog otpada',
        ];

        return data_get($problemTypes, $type_code, '');
    }
}

if (!function_exists('get_problem_color')) {
    function get_problem_color($status)
    {
        $problemColors = [
            'g-1' => 'green', // Green-area
            'g-2' => 'green',
            'g-3' => 'green',
            'g-4' => 'green',
            'g-5' => 'green',
            'w-1' => 'orange', // Waste
            'w-2' => 'orange',
            'w-3' => 'orange',
        ];

        return data_get($problemColors, $status, 'black');
    }
}

if (!function_exists('get_translated_problem_status')) {
    function get_translated_problem_status($status)
    {
        $problemStatuses = [
            'pending' => 'na cekanju',
            'in-review' => 'u pregledu',
            'merged' => 'obedinjeno',
            'accepted' => 'prihvaceno',
            'rejected' => 'odbijeno',
            'closed' => 'zatvoreno',
            'open' => 'otvoreno',
        ];

        return data_get($problemStatuses, $status);
    }
}
