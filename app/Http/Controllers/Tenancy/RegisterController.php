<?php

namespace App\Http\Controllers\Tenancy;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterTanantRequest;
use App\Models\Tenant;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(RegisterTanantRequest $request)
    {
            $tenant = Tenant::create($request->validated());
            $tenant->createDomain(['domain' => $request->domain]);

            return redirect(tenant_route($tenant->domains->first()->domain,'tenant.login'));
    }
}
