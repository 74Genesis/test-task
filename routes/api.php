<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Core\UsersList\SearchUsers;

Route::get('/users', function (Request $request) {
    $search = new SearchUsers();

    try {
        $users = $search->fetchUsers($request);
    } catch (Exception $e) {
        // TODO: response with error
    }

    return response()->json($users);
});