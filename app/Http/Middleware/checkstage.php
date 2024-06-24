<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkstage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Memastikan pengguna sudah login dan memiliki relasi dengan Team
        if ($user && $user->teams) {
            $stage_id = $user->teams->stage_id;

            // Redirect berdasarkan stage_id
            if (in_array($stage_id, [1, 4, 7, 10]) && $request->path() !== 'submissions1') {
                return redirect('/submissions1');
            } elseif (in_array($stage_id, [2, 5, 8, 11]) && $request->path() !== 'submissions2') {
                return redirect('/submissions2');
            } elseif (in_array($stage_id, [3, 6, 9, 12]) && $request->path() !== 'final-submission') {
                return redirect('/final-submission');
            } else {
                // Pengguna sudah berada di halaman yang sesuai, lanjutkan request
                return $next($request);
            }
        }

        // Jika pengguna tidak memiliki tim atau tidak login, lanjutkan request
        return $next($request);

        // Jika pengguna tidak memiliki tim atau tidak login, lanjutkan request
        return $next($request);
    }
}
