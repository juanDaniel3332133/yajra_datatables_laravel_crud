<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTables\UserDataTable;

class UserController extends Controller
{
    public function dataTable(UserDataTable $userDataTable)
    {
        return $userDataTable->build();
    }
}
