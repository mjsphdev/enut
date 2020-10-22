<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $privacies = DB::table('page_contents')->where('slug', 'privacy-policy')->orWhere('slug', 'data-access-policy')->get();
        $ff_surveys = DB::table('files')->where('file_category', 'FactsandFigures')->join('surveys', 'surveys.year', '=', 'files.file_year')->select('surveys.year', 'surveys.survey_type')->distinct('surveys.year')->get();
        $pr_surveys = DB::table('files')->where('file_category', 'Presentation')->join('surveys', 'surveys.year', '=', 'files.file_year')->select('surveys.year', 'surveys.survey_type')->distinct('surveys.year')->get();
        $br_surveys = DB::table('brochure_categories')->join('surveys', 'surveys.year', '=', 'brochure_categories.brochure_year')->select('surveys.year', 'surveys.survey_type')->distinct('surveys.year')->get();
        View::share(['privacies'=>$privacies, 'ff_surveys'=>$ff_surveys, 'pr_surveys'=>$pr_surveys, 'br_surveys'=>$br_surveys]);

        if (!Collection::hasMacro('paginate')) {
            Collection::macro('paginate', 
                function ($perPage = 15, $page = null, $options = []) {
                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                return (new LengthAwarePaginator(
                    $this->forPage($page, $perPage), $this->count(), $perPage, $page, $options))->withPath('');
        });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
