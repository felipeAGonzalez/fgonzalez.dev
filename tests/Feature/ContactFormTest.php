<?php

namespace Tests\Feature;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    private array $validMessage = [
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.test',
        'subject' => 'Colaboración profesional',
        'message' => 'Me gustaría conversar sobre una oportunidad profesional.',
    ];

    public function test_contact_section_contains_an_accessible_csrf_protected_form(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('id="contacto"', false)
            ->assertSee('for="contact-name"', false)
            ->assertSee('for="contact-email"', false)
            ->assertSee('for="contact-subject"', false)
            ->assertSee('for="contact-message"', false)
            ->assertSee('name="_token"', false);
    }

    public function test_contact_form_validates_input_and_keeps_old_values(): void
    {
        $this->from(route('home').'#contacto')
            ->post(route('contact.store'), [
                'name' => 'Ada Lovelace',
                'email' => 'correo-invalido',
                'subject' => '',
                'message' => 'Muy corto',
            ])
            ->assertSessionHasErrors(['email', 'subject', 'message'])
            ->assertSessionHasInput('name', 'Ada Lovelace')
            ->assertSessionHasInput('email', 'correo-invalido');
    }

    public function test_valid_message_is_not_sent_without_a_configured_recipient(): void
    {
        Mail::fake();
        config()->set('portfolio.contact.recipient', null);

        $this->post(route('contact.store'), $this->validMessage)
            ->assertRedirect(route('home').'#contacto')
            ->assertSessionHas('contact_unavailable')
            ->assertSessionHasInput('email', $this->validMessage['email']);

        Mail::assertNothingSent();
    }

    public function test_valid_message_is_sent_when_a_recipient_is_configured(): void
    {
        Mail::fake();
        config()->set('portfolio.contact.recipient', 'owner@example.test');

        $this->post(route('contact.store'), $this->validMessage)
            ->assertRedirect(route('home').'#contacto')
            ->assertSessionHas('contact_success')
            ->assertSessionDoesntHaveErrors();

        Mail::assertSent(ContactMessage::class, function (ContactMessage $mail): bool {
            return $mail->hasTo('owner@example.test')
                && $mail->contact === $this->validMessage;
        });
    }
}
