<?php

namespace App\Http\Middleware;

use App\Http\Resources\DefaultResource;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;
use Symfony\Component\HttpFoundation\Response;

class CheckDatabaseConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            DB::connection()->getPdo();
        } catch (PDOException $e) {
            return response(new DefaultResource(false, 'Database connection error: ' . $e->getMessage(), null), 500);
        }
        return $next($request);
    }
}
