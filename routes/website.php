<?php

use Illuminate\Support\Facades\Route;
use App\Actions\{
    LocaleUpdateAction,
};
use App\Actions\Website\Home\{
    HomeIndexAction,
};
use App\Actions\Website\Signup\{
    SignupIndexAction,
    SignupStoreAction,
};
use App\Actions\Website\Download\{
    DownloadIndexAction,
};
use App\Actions\Website\Store\{
    StoreIndexAction,
};
use App\Actions\Website\Ranking\{
    RankingIndexAction,
    RankingNobilityAction,
    RankingClassAction,
    RankingCpsAction,
    RankingMoneyAction,
    RankingGuildAction,
    RankingPkAction,
    RankingOnlinePointAction,
    RankingEventPointAction,
    RankingMonsterPointAction,
};
use App\Actions\Website\Event\{
    EventIndexAction,
    EventShowAction,
};
use App\Actions\Website\News\{
    NewsIndexAction,
};
use App\Actions\Website\ScreenShot\{
    ScreenShotIndexAction,
};
use App\Actions\Website\ContactUs\{
    ContactUsIndexAction,
};
use App\Actions\Website\Login\{
    LoginIndexAction,
    LoginStoreAction,
};
use App\Actions\Website\Profile\{
    ProfileIndexAction,
};

Route::name('website.')->group(function () {

    Route::get('locale-update', LocaleUpdateAction::class)->name('locale-update');

    Route::name('home.')->group(function () {

        Route::get('', HomeIndexAction::class)->name('index');

    });

    Route::prefix('signup')->name('signup.')->group(function () {

        Route::get('', SignupIndexAction::class)->name('index');
        Route::post('', SignupStoreAction::class)->name('store');

    });

    Route::prefix('download')->name('download.')->group(function () {

        Route::get('', DownloadIndexAction::class)->name('index');

    });

    Route::prefix('store')->name('store.')->group(function () {

        Route::get('', StoreIndexAction::class)->name('index');

    });

    Route::prefix('ranking')->name('ranking.')->group(function () {

        Route::get('', RankingIndexAction::class)->name('index');
        Route::get('nobility', RankingNobilityAction::class)->name('nobility');
        Route::get('class', RankingClassAction::class)->name('class');
        Route::get('cps', RankingCpsAction::class)->name('cps');
        Route::get('money', RankingMoneyAction::class)->name('money');
        Route::get('guilds', RankingGuildAction::class)->name('guilds');
        Route::get('pk', RankingPkAction::class)->name('pk');
        Route::get('online-points', RankingOnlinePointAction::class)->name('online-points');
        Route::get('event-points', RankingEventPointAction::class)->name('event-points');
        Route::get('monster-points', RankingMonsterPointAction::class)->name('monster-points');

    });

    Route::prefix('events')->name('events.')->group(function () {

        Route::get('', EventIndexAction::class)->name('index');
        Route::get('{event}', EventShowAction::class)->name('show');

    });

    Route::prefix('news')->name('news.')->group(function () {

        Route::get('', NewsIndexAction::class)->name('index');

    });

    Route::prefix('screenshots')->name('screenshots.')->group(function () {

        Route::get('', ScreenShotIndexAction::class)->name('index');

    });

    Route::prefix('contact-us')->name('contact-us.')->group(function () {

        Route::get('', ContactUsIndexAction::class)->name('index');

    });

    Route::prefix('login')->name('login.')->group(function () {

        Route::get('', LoginIndexAction::class)->name('index');
        Route::post('', LoginStoreAction::class)->name('store');

    });

    Route::prefix('profile')->name('profile.')->group(function () {

        Route::get('', ProfileIndexAction::class)->name('index');

    });

});
