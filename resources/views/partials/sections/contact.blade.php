@php
    $contactLinks = [
        ['label' => 'Email', 'url' => config('portfolio.social.email')],
        ['label' => 'LinkedIn', 'url' => config('portfolio.social.linkedin')],
        ['label' => 'GitHub', 'url' => config('portfolio.social.github')],
    ];
@endphp

<section id="contacto" class="section-space scroll-mt-20">
    <div class="container-page grid gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
        <div>
            <x-ui.section-heading eyebrow="Conversemos">
                Contacto

                <x-slot:description>
                    Si tienes un proyecto, una oportunidad profesional o una conversación técnica en mente, puedes escribirme por este medio.
                </x-slot:description>
            </x-ui.section-heading>

            <ul class="mt-8 grid max-w-md gap-3" aria-label="Canales profesionales">
                @foreach ($contactLinks as $link)
                    <li>
                        @if ($link['url'])
                            <a
                                href="{{ $link['url'] }}"
                                class="social-link inline-flex"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                {{ $link['label'] }}
                            </a>
                        @else
                            <span class="social-link inline-flex cursor-not-allowed opacity-45" aria-disabled="true">
                                {{ $link['label'] }} · pendiente
                            </span>
                        @endif
                    </li>
                @endforeach
            </ul>

            @unless (config('portfolio.contact.recipient'))
                <p class="placeholder-content mt-8 max-w-md">
                    Envío pendiente de configurar: define PORTFOLIO_CONTACT_RECIPIENT para habilitar la entrega de mensajes.
                </p>
            @endunless
        </div>

        <div class="surface-card">
            @if (session('contact_success'))
                <div class="mb-6 rounded-xl border border-accent/30 bg-accent/10 p-4 text-sm text-metal" role="status">
                    {{ session('contact_success') }}
                </div>
            @endif

            @if (session('contact_unavailable'))
                <div class="mb-6 rounded-xl border border-brand-light/30 bg-brand/10 p-4 text-sm text-metal" role="alert">
                    {{ session('contact_unavailable') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="grid gap-5">
                @csrf

                <div>
                    <label for="contact-name" class="form-label">Nombre</label>
                    <input
                        id="contact-name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        class="form-control"
                        autocomplete="name"
                        required
                        maxlength="80"
                        @error('name') aria-invalid="true" aria-describedby="contact-name-error" @enderror
                    >
                    @error('name')
                        <p id="contact-name-error" class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contact-email" class="form-label">Email</label>
                    <input
                        id="contact-email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        class="form-control"
                        autocomplete="email"
                        required
                        maxlength="254"
                        @error('email') aria-invalid="true" aria-describedby="contact-email-error" @enderror
                    >
                    @error('email')
                        <p id="contact-email-error" class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contact-subject" class="form-label">Asunto</label>
                    <input
                        id="contact-subject"
                        name="subject"
                        type="text"
                        value="{{ old('subject') }}"
                        class="form-control"
                        required
                        maxlength="120"
                        @error('subject') aria-invalid="true" aria-describedby="contact-subject-error" @enderror
                    >
                    @error('subject')
                        <p id="contact-subject-error" class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contact-message" class="form-label">Mensaje</label>
                    <textarea
                        id="contact-message"
                        name="message"
                        rows="7"
                        class="form-control resize-y"
                        required
                        minlength="20"
                        maxlength="5000"
                        @error('message') aria-invalid="true" aria-describedby="contact-message-error" @enderror
                    >{{ old('message') }}</textarea>
                    @error('message')
                        <p id="contact-message-error" class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-ui.button type="submit">Enviar mensaje</x-ui.button>
                </div>
            </form>
        </div>
    </div>
</section>
