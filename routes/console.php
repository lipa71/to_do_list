<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('email:task-deadline')->withoutOverlapping()->dailyAt('10:00');
