<!DOCTYPE html>
<html>
<head>
    <title>Dispatch</title>
    <style>
        /* Add some basic styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Dispatch Center</h1>
    <table>
        <thead>
            <tr>
                <th>Respondent</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($respondents as $respondent)
                <tr>
                    <td>{{ $respondent->name }}</td>
                    <td id="status-{{ $respondent->id }}">Available</td>
                    <td>
                        <button onclick="handleCall('{{ $respondent->id }}')">Handle Call/Text</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function handleCall(respondentId) {
            fetch('/dispatch/handle', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ respondent_id: respondentId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'Handled') {
                    document.getElementById('status-' + respondentId).innerText = 'Busy';
                }
            });
        }

        function recordLog(respondentId, userId, details) {
            fetch('/dispatch/record', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ respondent_id: respondentId, user_id: userId, details: details })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'Recorded') {
                    document.getElementById('status-' + respondentId).innerText = 'Available';
                }
            });
        }
    </script>
</body>
</html>
