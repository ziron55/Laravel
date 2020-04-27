<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Aktualnosci</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <link href="{{ asset('css/custom_style.css') }}" rel="stylesheet">
</head>
<body>
@include('layouts.navbar')
<div class="table-container">
        <div class="title">
            <h3>Aktualności</h3>
        </div>

<table data-toggle="table">
        
            <thead>
                <tr>
                    <th colspan="6">Użytkownicy</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                    <tr>
                        <td colspan="3" style="font-weight: bold;">{{$user->name}}</td>
                        <td colspan="3">{{$user->email}}</td>
                    </tr>
                    @foreach($orders as $order)
                    @if($user->id == $order->user_id)
                    <tr>
                    <td>Typ treningu</td>
                    <td>{{$order->typ}}</td>
                    <td>Data treningu:</td>
                    <td>{{$order->data}}</td>
                    <td>data rezerwacji</td>
                    <td>{{$order->created_at}}</td>
                    </tr>
                    <tr>
                    <td>Informacje dodatkowe</td>
                    <td colspan="2">{{$order->info}}
                    
                    </td>
                    <td><a href="{{ route('editAdmin', $order) }}" class="btn btn-success btn-xs" title="Edytuj"> Edytuj
                        </a></td>
                    <td colspan="2"><a href="{{ route('deleteOrder', $order) }}" class="btn btn-danger btn-xs"
                            onclick="return confirm('Jesteś pewien?')" title="Skasuj"><i class="fa fa-trash-o"></i> Usuń
                        </a></td></tr>
                    @endif
                    @endforeach
                @endforeach    
             </tbody>
             
        </table>
</div>
</body>
</html>