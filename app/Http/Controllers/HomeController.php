<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;

class HomeController extends Controller
{
    public function index()
    {
        $serviceCategories = ServiceCategory::query()
            ->select([
                'id',
                'name',
                'slug',
                'description',
                'is_active',
            ])
            ->where('is_active', true)
            ->with('services')
            ->get();

        return view('pages.home.index', compact('serviceCategories'));
    }
}
