<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Car;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('category');
    }

    public function animals() {
        $animals = Animal::all();
        return view('animals', compact('animals'));
    }

    public function cars() {
       $cars = Car::all();
       return view('cars', compact('cars'));
    }
}
