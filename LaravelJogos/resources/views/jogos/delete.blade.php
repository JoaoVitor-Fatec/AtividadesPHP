<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Excluir Jogo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Exclusão do Jogo</h1>
            <div class="alert alert-warning" role="alert">
                Você tem certeza que deseja excluir esse jogo?
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>ID:</strong></label>
                <p>{{ $jogo->id }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Nome:</strong></label>
                <p>{{ $jogo->nome }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Empresa:</strong></label>
                <p>{{ $jogo->empresa }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Gênero:</strong></label>
                <p>{{ $jogo->genero }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label"><strong>Indicação:</strong></label>
                <p>{{ $jogo->indicacao }}</p>
            </div>
        <form action="{{ route('jogos.destroy', $jogo->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button tyle="submit" class="btn btn-danger">Excluir</button>
            <a href="{{ route('jogos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>   
    </div>
<script src="https://stackpath.boostrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script> 
</body>
</html>