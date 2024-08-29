<?php

namespace App\Http\Middleware;

use App\Models\Payments;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class payment2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Memastikan pengguna sudah login dan memiliki relasi dengan Team
        if ($user && $user->teams) {
            $team_id = $user->teams->id;
            $paymentStatus = Payments::where('team_id', $team_id)
                ->whereIn('stage_id', [2, 5, 8, 11])
                ->orderBy('created_at', 'desc')
                ->pluck('status')
                ->first();

            // Redirect berdasarkan status pembayaran
            if ($paymentStatus === 'verified') {
                return $next($request);
            } elseif ($paymentStatus === 'unverified' || $paymentStatus === null) {
                return redirect('/payment');
            }
            // Jika pengguna tidak memiliki tim atau belum login, arahkan ke halaman lain
            return redirect('/login');
        }
    }
}
