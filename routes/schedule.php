<?php
use schedule;
use Illuminate\Support\Facades\Artisan;

schedule(function ($schedule) {
    $schedule->command('absen:check-alpa')->dailyAt('07:31');
});
