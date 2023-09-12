<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Preços de Frete</title>
    <link rel="stylesheet" href=".../resources/css/style.css">
</head>

<body>
    <h1>Tabela de Preços de Frete</h1>

    <table>
        <thead>
            <tr>
                <th>From Postcode</th>
                <th>To Postcode</th>
                <th>From Weight</th>
                <th>To Weight</th>
                <th>Cost</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($freteData as $frete)
            <tr>
                <td>{{ $frete->from_postcode }}</td>
                <td>{{ $frete->to_postcode }}</td>
                <td>{{ $frete->from_weight }}</td>
                <td>{{ $frete->to_weight }}</td>
                <td>{{ $frete->cost }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>