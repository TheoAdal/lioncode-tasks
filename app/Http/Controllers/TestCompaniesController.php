<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TestCompanies;

class TestCompaniesController extends Controller
{
    public function form(Request $request)
    {
        return view('companies.form');
    }

    public function show(Request $request)
    {
        if(!$request->bearerToken()){
            return response()->json([
                'success' => false,
                'message' => 'No token. ACCESS DENIED',
            ], 401);
        } 
        else {
            $companies = TestCompanies::all();

        return response()->json([
            'success' => true,
            'message' => 'ALL THE COMPANIESSS',
            'data' => $companies,
            'token' => $request->bearerToken(),
        ], 200);
        }
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'min:5','max:225', 'string'],
            'adress' => ['required', 'min:5','max:225', 'string'],
            'phone' => ['required', 'min:8','max:15', 'string'],
        ]);

        TestCompanies::create($credentials);

        return response()->json(['credentials' => $credentials]);
        
        // return redirect()-> route ('');
       
    }
}

