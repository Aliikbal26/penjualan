<?php

namespace App\Http\Controllers;

use App\Models\InventoryTransactions;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $penjualan = InventoryTransactions::sum('jumlah');
        $penjualan1 = InventoryTransactions::with('product')->get();
        $totalPendapatan = $penjualan1->reduce(function ($carry, $item) {
            return $carry + ($item->product->selling_price * $item->jumlah);
        }, 0);
        $totalLaba = $penjualan1->reduce(function ($carry, $item) {
            return $carry + ($item->product->purchase_price * $item->jumlah);
        }, 0);

        $keuntungan = $totalPendapatan - $totalLaba;

        return view("dashboard", [
            "title" => "Dashboard",
            "name" => "Ali Ikbal",
            "penjualan" => $penjualan,
            "total" => $totalPendapatan,
            "laba" => $totalLaba,
            "keuntungan" => $keuntungan
        ]);
    }

    public function login()
    {
        return view("template.login", [
            "title" => "Login",
            "name" => "Ali Ikbal"
        ]);
    }

    public function doLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (empty($email) || empty($password)) {
            return view('template.login', [
                "title" => "Login",
                "error" => "Email or Password is required !"
            ]);
        }

        if ($this->userService->login($email, $password)) {
            $request->session()->put("email", $email);
            return redirect("/dashboard");
        } else {
            return view('template.login', [
                "title" => "Login",
                "error" => "Email or Password is Wrong !"
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget("email");
        return redirect("/");
    }

    public function register()
    {
        return view('template.register', [
            "title" => "Registrasi",
        ]);
    }

    public function doRegister(Request $request)
    {

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;


        if (empty($email) || empty($password) || empty($name)) {
            return view('template.register', [
                "title" => "Register",
                "error" => "Email or Password is required !"
            ]);
        }

        $userEmail =  $this->userService->findByEmail($email);

        if ($userEmail) {
            return view('template.register', [
                "title" => "Register",
                "error" => "Email is Alredy !"
            ]);
        } else {
            $this->userService->register($name, $email, $password);
            return redirect('/');
        }
    }

    public function profile()
    {
        return view('users.index', [
            "title" => "profile",
            "name" => "ali"
        ]);
    }
}
