<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\MyFirstNotification;
use Notification;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sendNotification()
    {
        $user = User::first();
  
        $details = [
            'greeting' => 'Olá',
            'body' => 'Esta é minha primeira notificação laravel',
            'thanks' => 'Obrigado por usar nossas soluções',
            'actionText' => 'Exibir meu site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];
  
        Notification::send($user, new MyFirstNotification($details));
   
        dd('done');
    }
}
