<h1>Zestawienie danych</h1>
<table border="1">
    <thead>
    <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Załącznik</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($submissions as $submission)
        <tr>
            <td>{{ $submission->first_name }}</td>
            <td>{{ $submission->last_name }}</td>
            <td><a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank">Pobierz</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
