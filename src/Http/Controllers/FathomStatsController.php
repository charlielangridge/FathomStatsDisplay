<?php

namespace Ganda\FathomStatsDisplay\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class FathomStatsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function __invoke(Request $request, $days = 7)
    {

        $key = 'fathomStats_'.$days;
        if (Cache::has($key)) {
            return Cache::get($key);
        };

        $response = Http::withToken(env('FATHOM_TOKEN'))->get('https://api.usefathom.com/v1/aggregations', [
            'entity' => 'pageview',
            'entity_id' => env('FATHOM_SITE_ID'),
            'aggregates' => implode(',', ['visits', 'uniques', 'pageviews', 'avg_duration', 'bounce_rate']),
            'date_from' => now()->subDays($days)->toDateTimeString()
        ]);

        $statData = $response->collect()[0];

        $response = Http::withToken(env('FATHOM_TOKEN'))->get('https://api.usefathom.com/v1/aggregations', [
            'entity' => 'pageview',
            'entity_id' => env('FATHOM_SITE_ID'),
            'aggregates' => implode(',', ['visits', 'uniques', 'pageviews', 'avg_duration', 'bounce_rate']),
            'date_from' => now()->subDays($days * 2)->toDateTimeString(),
            'date_to' => now()->subDays($days)->toDateTimeString()
        ]);

        $prevStatData = $response->collect()[0];


        $avg_duration_seconds = round($statData['avg_duration']);
        $prev_avg_duration_seconds = round($prevStatData['avg_duration']);
        $diff_avg_duration_seconds = abs($avg_duration_seconds- $prev_avg_duration_seconds);
        $visits_diff = $statData['visits'] - $prevStatData['visits'];
        $uniques_diff = $statData['uniques'] - $prevStatData['uniques'];
        $pageviews_diff = $statData['pageviews'] - $prevStatData['pageviews'];


        $data = [
            'statBlocks' => [
                [
                    'title' => 'visits',
                    'mainStat' => $statData['visits'] > 1000 ? round($statData['visits'] / 1000,
                            2).'k' : $statData['visits'],
                    'prevStat' => $statData['visits'] > 1000 ? round($statData['visits'] / 1000,
                            2).'k' : $statData['visits'],
                    'diff' => abs($visits_diff) > 1000 ? round(abs($visits_diff) / 1000, 2).'k' : abs($visits_diff),
                    'up' =>  $visits_diff > 0,
                ],
                [
                    'title' => 'uniques',
                    'mainStat' => $statData['uniques'] > 1000 ? round($statData['uniques'] / 1000,
                            2).'k' : $statData['uniques'],
                    'prevStat' => $statData['uniques'] > 1000 ? round($statData['uniques'] / 1000,
                            2).'k' : $statData['uniques'],
                    'diff' => abs($uniques_diff) > 1000 ? round(abs($uniques_diff) / 1000, 2).'k' : abs($uniques_diff),
                    'up' =>  $uniques_diff > 0
                ],
                [
                    'title' => 'pageviews',
                    'mainStat' => $statData['pageviews'] > 1000 ? round($statData['pageviews'] / 1000,
                            2).'k' : $statData['pageviews'],
                    'prevStat' => $statData['pageviews'] > 1000 ? round($statData['pageviews'] / 1000,
                            2).'k' : $statData['pageviews'],
                    'diff' => abs($pageviews_diff) > 1000 ? round(abs($pageviews_diff) / 1000, 2).'k' : abs($pageviews_diff),
                    'up' =>  $pageviews_diff > 0,
                ],
                [
                    'title' => 'avg duration',
                    'mainStat' => sprintf('%02d:%02d', ($avg_duration_seconds / 60), $avg_duration_seconds % 60),
                    'prevStat' => sprintf('%02d:%02d', ($prev_avg_duration_seconds / 60), $prev_avg_duration_seconds % 60),
                    'diff' => sprintf('%02d:%02d', ($diff_avg_duration_seconds / 60), $diff_avg_duration_seconds % 60),
                    'up' =>  $diff_avg_duration_seconds > 0,
                ],
                [
                    'title' => 'bounce rate',
                    'mainStat' => round($statData['bounce_rate'] * 100) . '%',
                    'prevStat' => round($prevStatData['bounce_rate'] * 100) . '%',
                    'diff' => abs(round($statData['bounce_rate'] * 100) - round($prevStatData['bounce_rate'] * 100)).'%',
                    'up' =>  round($statData['bounce_rate'] * 100) - round($prevStatData['bounce_rate'] * 100) > 0,
                ],
            ],
            'timePeriod' => $days,
        ];

        Cache::put($key, $data, now()->addHour());

        return $data;
    }
}
