<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Presence;
use Carbon\Carbon;

// class MarkAbsenceAsAlpa extends Command
// {
//     protected $signature = 'absence:mark-alpa';
//     protected $description = 'Mark users as alpa if they did not check in by 07:30';

//     public function handle()
//     {
//         $today = Carbon::now()->toDateString();

//         $users = User::all();
//         foreach ($users as $user) {
//             if ($user->hasRole('admin')) {
//                 continue;
//             }

//             $presence = $user->presences()->where('date', $today)->first();

//             if (!$presence) {
//                 if (!$user->level_id || !$user->major_id) {
//                     $this->error("User {$user->name} does not have a valid level_id or major_id.");
//                     continue;
//                 }

//                 Presence::create([
//                     'user_id' => $user->id,
//                     'level_id' => $user->level_id,
//                     'major_id' => $user->major_id,
//                     'date' => $today,
//                     'status' => 'alpa',
//                     'time_comes' => null,
//                     'time_leaves' => null,
//                 ]);

//                 $this->info("Marked user {$user->name} as alpa.");
//             }
//         }

//         $this->info('All users without check-in have been marked as alpa, except admins.');
//     }
// }
