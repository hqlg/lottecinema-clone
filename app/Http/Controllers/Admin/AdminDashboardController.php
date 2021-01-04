<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/pages/Dashboard', [
            'title' => 'Dashboard',
        ]);
    }
}
