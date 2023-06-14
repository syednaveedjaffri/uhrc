<?php

namespace App\Providers;

use App\Models\Campus;
use App\Models\Complain;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Faculty;
use App\Models\Query;
use App\Models\Role;
use App\Models\Vendor;
use App\Policies\CampusPolicy;
use App\Policies\ComplainPolicy;
use App\Policies\DepartmentPolicy;
use App\Policies\EmployeePolicy;
use App\Policies\FacultyPolicy;
use App\Policies\QueryPolicy;
use App\Policies\VendorPolicy;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\PermissionPolicy;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Permission::class => PermissionPolicy::class,
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        Campus::class =>CampusPolicy::class,
        Complain::class =>ComplainPolicy::class,
        Department::class => DepartmentPolicy::class,
        Employee::class => EmployeePolicy::class,
        Faculty::class => FacultyPolicy::class,
        Query::class => QueryPolicy::class,
        Vendor::class => VendorPolicy::class,


    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });
    }
}
