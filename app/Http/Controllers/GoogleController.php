<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            Log::error('Errore nel redirect a Google:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect('/login')->with('error', 'Errore nella connessione con Google. Per favore riprova più tardi.');
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            if (!$googleUser) {
                Log::error('Dati utente Google non ricevuti');
                return redirect('/login')->with('error', 'Non siamo riusciti a recuperare i dati da Google. Per favore riprova.');
            }

            Log::info('Dati ricevuti da Google:', [
                'id' => $googleUser->getId(),
                'email' => $googleUser->getEmail(),
                'name' => $googleUser->getName()
            ]);

            // Prima cerca per google_id
            $user = User::where('google_id', $googleUser->getId())->first();

            // Se non trova per google_id, cerca per email
            if (!$user) {
                $user = User::where('email', $googleUser->getEmail())->first();
                
                // Se trova l'utente per email, aggiorna il google_id
                if ($user) {
                    $user->update(['google_id' => $googleUser->getId()]);
                    Log::info('Aggiornato google_id per utente esistente:', ['user_id' => $user->id]);
                }
            }

            // Se l'utente esiste (trovato per google_id o email)
            if ($user) {
                Auth::login($user);
                return redirect()->route('home')
                    ->with('success', 'Bentornato ' . $user->name . '! Login effettuato con successo.');
            }

            // Se l'utente non esiste, crealo
            $newUser = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt('123456dummy')
            ]);

            Auth::login($newUser);
            return redirect()->route('home')
                ->with('success', 'Benvenuto ' . $newUser->name . '! Il tuo account è stato creato con successo.');

        } catch (\Exception $e) {
            Log::error('Errore nel callback Google:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect('/login')
                ->with('error', 'Si è verificato un errore durante l\'autenticazione con Google. ' . 
                       'Dettaglio: ' . $e->getMessage());
        }
    }
}
