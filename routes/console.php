<?
use App\Console\Commands\MarkAbsenceAsAlpa;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::dailyAt('07:31', function () {
    Artisan::call(MarkAbsenceAsAlpa::class);
});
