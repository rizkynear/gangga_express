<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Company;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;

class CompanyController extends Controller
{
    public function show()
    {
        return new CompanyCollection(Company::all());
    }
}
