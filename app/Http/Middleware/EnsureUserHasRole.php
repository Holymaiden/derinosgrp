<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Periksa apakah pengguna memiliki peran yang diperlukan
        if ($request->user() && $request->user()->hasRole($role)) {
            return $next($request);
        }

        // Jika pengguna tidak memiliki peran yang diperlukan, Anda dapat mengambil tindakan sesuai kebijakan Anda,
        // seperti mengarahkannya kembali atau menampilkan pesan kesalahan.
        abort(403, 'Unauthorized action.');
    }
}
