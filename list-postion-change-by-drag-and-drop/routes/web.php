<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $users = User::orderBy('position_id','asc')->get();
    return view('dashboard',['users'=>$users]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('updateRecordsListings', function (Request $request) {
    // Iterate through the positions array sent from the frontend
    foreach ($request->recordsArray as $position => $id) {
        // Find the user by the given ID
        $user = User::find($id);
        // Update the user's position
        $user->position_id = $position + 1; // Assuming position starts at 1
        $user->save();
    }

    return response()->json(['success' => true]);
})->name('updateRecordsListings');

require __DIR__.'/auth.php';
