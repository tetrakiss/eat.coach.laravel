<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PollController extends Controller
{
     public function deegreeJKT() {
       return view('poll.jkt');
     }
}
