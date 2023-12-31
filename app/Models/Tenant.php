<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as TenantModel;


class Tenant extends TenantModel implements TenantWithDatabase
{
    use HasFactory,HasDatabase,HasDomains;

    public static function booted()
    {
        parent::booted(); // TODO: Change the autogenerated stub
        static::creating(function ($tenant){
            $tenant->password = bcrypt($tenant->password);
        });
    }
}
