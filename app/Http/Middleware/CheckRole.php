<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/home')->with('error', 'You must be logged in.');
        }
        $userRole = strtolower(Auth::user()->role->name);
        $routeName = $request->route()->getName();

        $permissions = [
            'admin' => ['*'], 

            'hr' => [
                'home',
                // Employees
                'employees.index',
                'employees.add',
                'employees.store',
                'employees.edit',
                'employees.update',
                'employees.delete',
                // Leaves
                'leaves.index',
                'leaves.add',
                'leaves.store',
                'leaves.edit',
                'leaves.update',
                'leaves.delete',
                // Attendances
                'attendances.index',
                'attendances.add',
                'attendances.store',
                'attendances.edit',
                'attendances.update',
                'attendances.delete',
                // Leaves
                'leaves.index',
                'leaves.add',
                'leaves.store',
                'leaves.edit',
                'leaves.update',
                'leaves.delete',
                // Payrolls
                'payrolls.index',
                'payrolls.add',
                'payrolls.store',
                'payrolls.edit',
                'payrolls.update',
                'payrolls.delete',
            ],

            'employee' => [
                // Attendances
                'attendances.index',
                'attendances.add',
                'attendances.store',
                'attendances.edit',
                'attendances.update',
                'attendances.delete',
                // Leaves
                'leaves.index',
                'leaves.add',
                'leaves.store',
                'leaves.edit',
                'leaves.update',
                'leaves.delete',
            ],

        ];


         // Check if the user's role has permission for this route
        if (!array_key_exists($userRole, $permissions)) {
            return redirect('/home')->with('error', 'Your role does not have any permissions.');
        }

        $allowedRoutes = $permissions[$userRole];

        if ($userRole == 'employee' && !in_array($routeName, $allowedRoutes)) {
            return redirect('/attendances/list');
        }

        if (in_array('*', $allowedRoutes) || in_array($routeName, $allowedRoutes)) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'You do not have permission to access this page.');

    }
}
