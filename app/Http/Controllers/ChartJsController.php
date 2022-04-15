<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donate;
use DB;
use Carbon\Carbon;

class ChartJsController extends Controller
{
    // public function index()
    // {
    //     $year = ['2015','2016','2017','2018','2019','2020'];

    //     $user = [];
    //     foreach ($year as $key => $value) {
    //         $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
    //     }

    // 	return view('chartjs')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    // }

    public function index()
    {
        // Get users grouped by age
        $groups = DB::table('donations')
                        ->select('amount', DB::raw('count(*) as total'))
                        ->groupBy('amount')
                        ->pluck('total', 'amount')->all();
        // Generate random colours for the groups
        // for ($i=0; $i<=count($groups); $i++) {
        //             $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        //         }
        $colours = ('#3dc1bc');
        // Prepare the data for returning with the view
        $chart = new Donate();
                $chart->labels = (array_keys($groups));
                $chart->dataset = (array_values($groups));
                $chart->colours = $colours;

        return view('chartjs', compact('chart'));
    }
}
