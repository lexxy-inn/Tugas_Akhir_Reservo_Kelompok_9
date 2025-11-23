<?php
namespace App\Http\Controllers;
use App\Models\Court;
use Illuminate\Http\Request;

class CourtController extends Controller {
    public function index(){
        $courtsByType = Court::all()->groupBy('type');
        return view('see-more', compact('courtsByType'));
    }
    public function show($id){
        $court = Court::with('schedules')->findOrFail($id);
        return view('description', compact('court'));
    }
}
