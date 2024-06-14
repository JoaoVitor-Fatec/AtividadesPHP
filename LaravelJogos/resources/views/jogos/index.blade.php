<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Jogos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Lista de Jogos</h1>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <a href="{{ route('jogos.create') }}" class="btn btn-success mb-3">Adicionar Jogo</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Empresa</th>
                <th>Gênero</th>
                <th>Indicação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $jogos as $jogo )
                <tr>
                    <td>{{ $jogo->id }}</td>
                    <td>{{ $jogo->nome }}</td>
                    <td>{{ $jogo->empresa }}</td>
                    <td>{{ $jogo->genero }}</td>
                    <td>{{ $jogo->indicacao }}</td>
                    <td>
                        <a href="{{ route('jogos.show', $jogo->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('jogos.edit', $jogo->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('jogos.destroy', $jogo->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://stackpath.boostrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>