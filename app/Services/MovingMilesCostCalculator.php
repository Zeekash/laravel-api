<?php

namespace App\Services;

class MovingMilesCostCalculator
{
    protected $costData = [
        'studio' => [
            'company' => [
                ['max' => 150, 'min' => 6.80747074707471, 'maxCost' => 31.3535980264693],
                ['max' => 300, 'min' => 3.96210754807246, 'maxCost' => 14.6920477832759],
                ['max' => 500, 'min' => 3.37472320234548, 'maxCost' => 12.0322276711863],
                ['max' => 1000, 'min' => 2.18657972296657, 'maxCost' => 5.71738673710121],
                ['max' => 1500, 'min' => 1.82809970907103, 'maxCost' => 4.27869409154946],
                ['max' => 2000, 'min' => 1.33148409999026, 'maxCost' => 2.93361034495965],
                ['max' => 2500, 'min' => 1.07378599347977, 'maxCost' => 2.46326813992129],
                ['max' => 3000, 'min' => 0.880660312897151, 'maxCost' => 2.17662398918873],
                ['max' => INF, 'min' => 0.741728261992829, 'maxCost' => 1.78902843501555]
            ],
            'container' => [
                ['max' => 150, 'min' => 6.57268060139347, 'maxCost' => 12.0076841017435],
                ['max' => 300, 'min' => 3.37803911488122, 'maxCost' => 5.88604845446951],
                ['max' => 500, 'min' => 2.83415765115276, 'maxCost' => 5.15189441660091],
                ['max' => 1000, 'min' => 1.44573497726049, 'maxCost' => 2.50013189430046],
                ['max' => 1500, 'min' => 1.104000434574847, 'maxCost' => 2.01265064658301],
                ['max' => 2000, 'min' => 0.856423697327844, 'maxCost' => 1.57766245987641],
                ['max' => 2500, 'min' => 0.736086850587751, 'maxCost' => 1.39930803480807],
                ['max' => 3000, 'min' => 0.682888033851367, 'maxCost' => 1.29922576105542],
                ['max' => INF, 'min' => 0.62919978579129, 'maxCost' => 1.2053547888492]
            ],
            'truck' => [
                ['max' => 150, 'min' => 0.983505017168384, 'maxCost' => 1.49127912791279],
                ['max' => 300, 'min' => 1.31415290362659, 'maxCost' => 1.2563459931881],
                ['max' => 500, 'min' => 1.03506826771544, 'maxCost' => 1.79328143998032],
                ['max' => 1000, 'min' => 0.716023261125998, 'maxCost' => 1.3144839544937],
                ['max' => 1500, 'min' => 0.636429825740122, 'maxCost' => 1.20463004861187],
                ['max' => 2000, 'min' => 0.577825999521823, 'maxCost' => 1.11424687779868],
                ['max' => 2500, 'min' => 0.551116219212486, 'maxCost' => 1.08728321264994],
                ['max' => 3000, 'min' => 0.543295478954459, 'maxCost' => 1.05714653038682],
                ['max' => INF, 'min' => 0.518681657928632, 'maxCost' => 0.987666006957568]
            ]
        ],
        'bedrooms2_3' => [
            'company' => [
                ['max' => 150, 'min' => 12.7049838317165, 'maxCost' => 36.5963796379638],
                ['max' => 300, 'min' => 6.40125099072468, 'maxCost' => 17.6076744567973],
                ['max' => 500, 'min' => 5.29699030667609, 'maxCost' => 15.2363311722021],
                ['max' => 1000, 'min' => 3.20477325260294, 'maxCost' => 7.87249528674972],
                ['max' => 1500, 'min' => 2.27640706337687, 'maxCost' => 5.33408442305373],
                ['max' => 2000, 'min' => 1.8282399439576, 'maxCost' => 3.9605731541311],
                ['max' => 2500, 'min' => 1.54532473414903, 'maxCost' => 3.20845236741449],
                ['max' => 3000, 'min' => 1.38732788545859, 'maxCost' => 2.92575502988767],
                ['max' => INF, 'min' => 1.13148870990214, 'maxCost' => 2.36365458112765]
            ],
            'container' => [
                ['max' => 150, 'min' => 8.94744807814115, 'maxCost' => 16.3581558155816],
                ['max' => 300, 'min' => 4.21190868910167, 'maxCost' => 8.33917557426329],
                ['max' => 500, 'min' => 3.63106132099061, 'maxCost' => 6.94397674639087],
                ['max' => 1000, 'min' => 1.87908595332092, 'maxCost' => 3.56891828775203],
                ['max' => 1500, 'min' => 1.37719444019156, 'maxCost' => 2.74227135027485],
                ['max' => 2000, 'min' => 1.12129686044963, 'maxCost' => 2.26543570241052],
                ['max' => 2500, 'min' => 0.950257036162666, 'maxCost' => 2.01717978240079],
                ['max' => 3000, 'min' => 0.885706034869988, 'maxCost' => 1.8336850028106],
                ['max' => INF, 'min' => 0.811399992864923, 'maxCost' => 1.68971123297088]
            ],
            'truck' => [
                ['max' => 150, 'min' => 1.08323499016568, 'maxCost' => 1.75150181684835],
                ['max' => 300, 'min' => 1.53074709565938, 'maxCost' => 1.510289261615577],
                ['max' => 500, 'min' => 1.05354061513846, 'maxCost' => 2.13763321822608],
                ['max' => 1000, 'min' => 0.769840184166206, 'maxCost' => 1.61088752292702],
                ['max' => 1500, 'min' => 0.677627305212317, 'maxCost' => 1.37053458539575],
                ['max' => 2000, 'min' => 0.610261946648086, 'maxCost' => 1.28561318624269],
                ['max' => 2500, 'min' => 0.59660378636782, 'maxCost' => 1.28990905370901],
                ['max' => 3000, 'min' => 0.602180069521982, 'maxCost' => 1.25434362316116],
                ['max' => INF, 'min' => 0.537623853147441, 'maxCost' => 1.18719427929501]
            ]
        ],
        'bedrooms4' => [
            'company' => [
                ['max' => 150, 'min' => 17.9776044271094, 'maxCost' => 46.1771777177718],
                ['max' => 300, 'min' => 8.67764710922606, 'maxCost' => 23.460117530293],
                ['max' => 500, 'min' => 7.68998641562551, 'maxCost' => 17.7706379514149],
                ['max' => 1000, 'min' => 5.52817829041122, 'maxCost' => 11.2470337632363],
                ['max' => 1500, 'min' => 3.70253249658598, 'maxCost' => 7.03779404690164],
                ['max' => 2000, 'min' => 3.41232638946091, 'maxCost' => 5.82240534749108],
                ['max' => 2500, 'min' => 2.83654972993362, 'maxCost' => 5.07219647981727],
                ['max' => 3000, 'min' => 2.6279249111876, 'maxCost' => 4.24270962796341],
                ['max' => INF, 'min' => 2.16683393012312, 'maxCost' => 3.57388151508615]
            ],
            'container' => [
                ['max' => 150, 'min' => 11.4709837650432, 'maxCost' => 20.6441944194419],
                ['max' => 300, 'min' => 5.79678255467729, 'maxCost' => 10.2981142314476],
                ['max' => 500, 'min' => 4.75508987902821, 'maxCost' => 8.62924272218862],
                ['max' => 1000, 'min' => 2.46546883629595, 'maxCost' => 4.75744574222186],
                ['max' => 1500, 'min' => 1.86202360556206, 'maxCost' => 3.64484374201106],
                ['max' => 2000, 'min' => 1.48038953802437, 'maxCost' => 3.06764793892842],
                ['max' => 2500, 'min' => 1.29344511681345, 'maxCost' => 2.64893605157982],
                ['max' => 3000, 'min' => 1.15387189087546, 'maxCost' => 2.52793412721353],
                ['max' => INF, 'min' => 1.09108583295796, 'maxCost' => 2.34928257523149]
            ],
            'truck' => [
                ['max' => 150, 'min' => 1.25685235190186, 'maxCost' => 1.93743707704104],
                ['max' => 300, 'min' => 1.82290912466351, 'maxCost' => 4.72012367100086],
                ['max' => 500, 'min' => 1.3050890549217, 'maxCost' => 2.5220459761274],
                ['max' => 1000, 'min' => 0.933879405567942, 'maxCost' => 1.90836286572436],
                ['max' => 1500, 'min' => 0.881893860123058, 'maxCost' => 1.72621371982305],
                ['max' => 2000, 'min' => 0.787643291835776, 'maxCost' => 1.65383855678487],
                ['max' => 2500, 'min' => 0.59660378636782, 'maxCost' => 1.28990905370901],
                ['max' => 3000, 'min' => 0.602180069521982, 'maxCost' => 1.25434362316116],
                ['max' => INF, 'min' => 0.537623853147441, 'maxCost' => 1.18719427929501]
            ]
        ]
    ];

    public function calculate(float $miles): array
    {
        $result = [];

        foreach ($this->costData as $sizeKey => $types) {
            foreach ($types as $typeKey => $ranges) {
                $range = $this->findCost($ranges, $miles);

                if ($miles <= 0) {
                    $result[$sizeKey][$typeKey] = [
                        'min' => 0,
                        'max' => 0,
                        'min_formatted' => '$0',
                        'max_formatted' => '$0',
                        'range_formatted' => '$0 - $0',
                    ];
                } else {
                    $minTotal = $miles * $range['min'];
                    $maxTotal = $miles * $range['maxCost'];

                    $result[$sizeKey][$typeKey] = [
                        'min' => $minTotal,
                        'max' => $maxTotal,
                        'min_formatted' => '$' . number_format($minTotal),
                        'max_formatted' => '$' . number_format($maxTotal),
                        'range_formatted' => '$' . number_format($minTotal) . ' - $' . number_format($maxTotal),
                    ];
                }
            }
        }

        return $result;
    }

    private function findCost(array $ranges, float $miles)
    {
        foreach ($ranges as $r) {
            if ($miles <= $r['max']) {
                return $r;
            }
        }
        return end($ranges);
    }

    // public function calculateDistance(string $origin, string $destination): array
    // {
    //     try {
    //         $apiKey = 'AIzaSyCHW9HsBjpXrd0oRC8sm-0TTi6OCLnWBzE';

    //         $response = \Illuminate\Support\Facades\Http::get('https://maps.googleapis.com/maps/api/directions/json', [
    //             'origin' => $origin,
    //             'destination' => $destination,
    //             'key' => $apiKey,
    //         ]);

    //         if ($response->successful()) {
    //             $data = $response->json();
    //             if (!empty($data['routes'][0]['legs'][0]['distance']['value'])) {
    //                 $meters = $data['routes'][0]['legs'][0]['distance']['value'];
    //                 $durationSeconds = $data['routes'][0]['legs'][0]['duration']['value'] ?? 0;
    //                 return [
    //                     'miles' => $meters * 0.000621371,
    //                     'duration' => $durationSeconds
    //                 ];
    //             }
    //         }
    //     } catch (\Exception $e) {
    //         return ['miles' => 0.0, 'duration' => 0];
    //     }

    //     return ['miles' => 0.0, 'duration' => 0];
    // }

    public function calculateDistance($cityToCityRoute): array
    {
        // Get miles from the database object passed in
        $miles = (float) ($cityToCityRoute->miles ?? 0);

        // Estimate duration in seconds (Miles / 55mph * 3600 seconds)
        // This keeps the 'duration' variable populated for the next method
        $durationSeconds = ($miles > 0) ? ($miles / 55) * 3600 : 0;

        return [
            'miles' => $miles,
            'duration' => (int) $durationSeconds
        ];
    }

    public function calculateTravelTime(int $googleDurationSeconds): string
    {
        $moveDurationSeconds = $googleDurationSeconds;
        $days = (int) floor($moveDurationSeconds / 86400);
        $hours = (int) floor(($moveDurationSeconds % 86400) / 3600);
        $minutes = (int) round(($moveDurationSeconds % 3600) / 60);

        if ($days >= 1) {
            $dayStr = $days . ($days === 1 ? " day " : " days ");
            $hourStr = $hours . ($hours === 1 ? " hour" : " hours");
            return $dayStr . $hourStr;
        }

        if ($hours < 1) {
            return $minutes . ($minutes === 1 ? " minute" : " minutes");
        }

        $hLabel = $hours === 1 ? " hour " : " hours ";
        return $hours . $hLabel . $minutes . " minutes";
    }
}
