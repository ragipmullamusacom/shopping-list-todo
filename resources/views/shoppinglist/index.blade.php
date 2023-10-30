<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>
            table {
            border-collapse: collapse;
            }

            tr {
            border-bottom: 1pt solid black;
            }
        </style>
    </head>
    <body class="antialiased" style="padding:50px">
        <div class="container">
            <h1>Shopping List</h1>

            <ul>
                <li>
                    @php
                     $say = 1;   
                    @endphp
                    <table cellpadding="5" style="margin-top: 10px;">
                        <tr>
                            <td width="50px">
                                SAYI
                            </td>
                            <td width="50px">
                                ID
                            </td>
                            <td width="150px">
                                AD
                            </td>
                            <td width="250px" colspan="2">
                                İŞLEM
                            </td>
                        </tr>
                        @foreach($items as $item)
                        <tr>
                            <td>
                                {{ $say }}
                            </td>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                @if (!$item->completed)
                                <form action="items/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Tmamlandı olarak işalelte</button>
                                </form>
                                @else
                                Tmamlandı
                                @endif
                            </td>
                            <td>
                                <form action="items/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">sil</button>
                                </form>
                            </td>
                        </tr>
                        @php $say = $say + 1; @endphp
                        @endforeach
                    </table>
                </li>
            </ul>

            <form action="items" method="POST" style="margin-top:10px">
                @csrf
                <input type="text" name="name" placeholder="İSİM" required>
                <button type="submit">EKLE</button>
            </form>
        </div>
    </body>
</html>
