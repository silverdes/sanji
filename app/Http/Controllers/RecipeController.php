<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    //
    public function index(): \Inertia\Response
    {
        return Inertia::render('Recipes/Index',[
            'recipes' => Recipe::all()
        ]);
    }
    
    public function create(): \Inertia\Response
    {
        # code...
        return Inertia::render('Recipes/Create');
    }
}
