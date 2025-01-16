<h1>Formularz</h1>
@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Imię: <input type="text" name="first_name" required></label><br>
    <label>Nazwisko: <input type="text" name="last_name" required></label><br>
    <label>Załącznik: <input type="file" name="file" required></label><br>
    <button type="submit">Wyślij</button>
</form>
