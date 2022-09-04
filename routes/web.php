<?php

use App\Http\Controllers\Admin\ClaimController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MetadataController;
use App\Http\Controllers\Admin\NftController;
use App\Http\Controllers\Admin\PassController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Auth\UserTeamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Team
    Route::resource('teams', TeamController::class, ['except' => ['store', 'update', 'destroy']]);

    // Pass
    Route::resource('passes', PassController::class, ['except' => ['store', 'update', 'destroy']]);

    // Collection
    Route::resource('collections', CollectionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Metadata
    Route::resource('metadatas', MetadataController::class, ['except' => ['store', 'update', 'destroy']]);

    // Nft
    Route::resource('nfts', NftController::class, ['except' => ['store', 'update', 'destroy']]);

    // Claim
    Route::resource('claims', ClaimController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});

Route::group(['prefix' => 'team', 'as' => 'team.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserTeamController.php'))) {
        Route::get('/', [UserTeamController::class, 'show'])->name('show');
        Route::get('{team}/accept', [UserTeamController::class, 'accept'])->middleware('signed')->name('accept');
    }
});
