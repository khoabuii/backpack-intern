<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\Categories;
use App\Models\Categories_child;
use App\Models\Posts;
use App\Models\Tag;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class WeeklyUsersChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WeeklyUsersChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $labels=[];
        for ($days_backwards = 30; $days_backwards >= 0; $days_backwards--) {
            if ($days_backwards == 1) {
            }
            $labels[] = $days_backwards.' ngày trước';
        }
        $this->chart->labels($labels);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/weekly-users'));

        // OPTIONAL
         $this->chart->minimalist(false);
         $this->chart->displayLegend(true);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
     public function data()
     {
//         $users_created_today = \App\User::whereDate('created_at', today())->count();

//         $this->chart->dataset('Users Created', 'bar', [
//                     $users_created_today,
//                 ])
//             ->color('rgba(205, 32, 31, 1)')
//             ->backgroundColor('rgba(205, 32, 31, 0.4)');

         for ($days_backwards = 30; $days_backwards >= 0; $days_backwards--) {
             // Could also be an array_push if using an array rather than a collection.
             $users[] = User::whereDate('created_at', today()->subDays($days_backwards))
                 ->count();
             $posts[] = Posts::whereDate('created_at', today()->subDays($days_backwards))
                 ->count();
             $categories[] = Categories::whereDate('created_at', today()->subDays($days_backwards))
                 ->count();
             $tags[] = Tag::whereDate('created_at', today()->subDays($days_backwards))
                 ->count();
             $categories_child=Categories_child::whereDate('created_at',today()->subDay($days_backwards))->count();
         }

         $this->chart->dataset('Người dùng', 'line', $users)
             ->color('rgb(77, 189, 116)')
             ->backgroundColor('rgba(77, 189, 116, 0.4)');

         $this->chart->dataset('Bài viết', 'line', $posts)
             ->color('rgb(96, 92, 168)')
             ->backgroundColor('rgba(96, 92, 168, 0.4)');

         $this->chart->dataset('Danh mục', 'line', $categories)
             ->color('rgb(255, 193, 7)')
             ->backgroundColor('rgba(255, 193, 7, 0.4)');

         $this->chart->dataset('Thẻ', 'line', $tags)
             ->color('rgba(70, 127, 208, 1) ')
             ->backgroundColor('rgba(70, 127, 208, 0.4)');
         $this->chart->dataset('Danh mục con','line',$tags)
             ->color('red')
             ->backgroundColor('green');
     }
}
