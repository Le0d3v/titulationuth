<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
         $request->validate([
            'matricula' => 'required|digits:10', // Validar que sea un número de 10 dígitos
            'password' => 'required',
        ]);

        // Buscar el usuario por matrícula
        $user = User::where('tuition', $request->matricula)->first();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && Auth::attempt(['id' => $user->id, 'password' => $request->password])) {
            $request->session()->regenerate();

            if($user->rol == 1) {
                return redirect()->intended('dashboard'); // Cambia 'dashboard' por la ruta deseada
            }
            
            return redirect()->intended('home'); // Cambia 'dashboard' por la ruta deseada

        }

        return back()->withErrors([
            'matricula' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
