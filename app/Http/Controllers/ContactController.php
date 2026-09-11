<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Mail\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        $recipient = config('portfolio.contact.recipient');

        if (! $recipient) {
            return redirect()
                ->to(route('home').'#contacto')
                ->withInput()
                ->with('contact_unavailable', 'El canal de envío aún no está configurado. Tus datos fueron validados, pero el mensaje no se envió.');
        }

        Mail::to($recipient)->send(new ContactMessage($request->validated()));

        return redirect()
            ->to(route('home').'#contacto')
            ->with('contact_success', 'Mensaje enviado correctamente. Gracias por contactarme.');
    }
}
