<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>九九表</title>
    <style>
        table,
        th,
        td {
            border-collapse: collapse;
        }

        th,
        td {
            width: 50px;
            height: 50px;
            text-align: center;
            border: solid 1px gray;
        }

        .even {
            color: red;
        }

    </style>
</head>

<body>
    <h1>九九表</h1>
    <main>
        <table>
            <tr>
                @for ($i = 0; $i < 10; $i++)
                    @if ($i == 0)
                        <th></th>
                    @else
                        <th>{{ $i }}</th>
                    @endif
                @endfor
            </tr>

            @for ($i = 1; $i < $dan + 1; $i++)
                <tr>
                    <th>{{ $i }}</th>
                    @for ($n = 1; $n < 10; $n++)
                        @if (($i * $n) % 2 == 0)
                            <td class="even">{{ $i * $n }}</td>
                        @else
                            <td>{{ $i * $n }}</td>
                        @endif
                    @endfor
                </tr>
            @endfor
        </table>
    </main>
</body>

</html>
