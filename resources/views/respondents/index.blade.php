<!DOCTYPE html>
<html>
<head>
    <title>Respondents</title>
</head>
<body>
    <h1>Respondents</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($respondents as $respondent)
                <tr>
                    <td>{{ $respondent->name }}</td>
                    <td>{{ $respondent->phone_number }}</td>
                    <td>
                        <button onclick="callRespondent('{{ $respondent->phone_number }}')">Call</button>
                        <button onclick="textRespondent('{{ $respondent->phone_number }}')">Text</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function callRespondent(phoneNumber) {
            fetch('/respondents/call', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ phone_number: phoneNumber })
            })
            .then(response => response.json())
            .then(data => alert(data.status));
        }

        function textRespondent(phoneNumber) {
            fetch('/respondents/text', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ phone_number: phoneNumber })
            })
            .then(response => response.json())
            .then(data => alert(data.status));
        }
    </script>
</body>
</html>
