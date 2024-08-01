<?php

namespace App\Actions\Dashboard\Profile;

use App\Actions\Action;
use App\Http\Resources\Dashboard\NotificationResource;
use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Notifications\DatabaseNotification as Notification;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class NotificationIndexAction extends Action
{
    public function handle()
    {
        // $user = User::find(1);
        // for ($i = 0; $i < 100; $i++) {
        //     $user->notify(new TestNotification());
        // }

        $queryBuilder = Notification::query()
            ->whereNotifiableType(User::class)
            ->whereNotifiableId(auth()->user()->id)
            ->orderByDesc('created_at');

        return Inertia::render('Dashboard/Profile/Notification', [

            'tableData' => NotificationResource::collection($queryBuilder->paginate(request('per_page') ?? 10))->resource,

        ]);
    }
}
