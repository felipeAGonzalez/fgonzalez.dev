<h1>Nuevo mensaje desde el portfolio</h1>

<p><strong>Nombre:</strong> {{ $contact['name'] }}</p>
<p><strong>Email:</strong> {{ $contact['email'] }}</p>
<p><strong>Asunto:</strong> {{ $contact['subject'] }}</p>

<h2>Mensaje</h2>
<p>{!! nl2br(e($contact['message'])) !!}</p>
