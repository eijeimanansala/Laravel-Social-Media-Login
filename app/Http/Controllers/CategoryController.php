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

    public function categoryanimals() {
        $data['animals'] = Animal::all();
        return view('animals', $data);
    }

    public function categorycars() {
       $data['cars'] = Car::all();
       return view('cars', $data);
    }
}
