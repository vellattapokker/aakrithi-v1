<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function showAuth()
    {
        if (Auth::check()) {
            return redirect()->route('account.dashboard');
        }
        return view('account');
    }

    public function dashboard()
    {
        $orderCount = \App\Models\Order::where('customer_email', Auth::user()->email)->count();
        $addressCount = Auth::user()->addresses()->count();
            
        return view('account-dashboard', compact('orderCount', 'addressCount'));
    }

    public function orders()
    {
        $orders = \App\Models\Order::where('customer_email', Auth::user()->email)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('account-orders', compact('orders'));
    }

    public function addresses()
    {
        $orderCount = \App\Models\Order::where('customer_email', Auth::user()->email)->count();
        $addresses = Auth::user()->addresses()->orderBy('is_default', 'desc')->get();
            
        return view('account-addresses', compact('addresses', 'orderCount'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if ($request->has('redirect_to')) {
                return redirect($request->redirect_to);
            }
            
            return redirect()->intended('account/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        if ($request->has('redirect_to')) {
            return redirect($request->redirect_to);
        }

        return redirect()->route('account.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
