<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Kirim data filter buku kalau perlu
        return view('landing');
    }
}
