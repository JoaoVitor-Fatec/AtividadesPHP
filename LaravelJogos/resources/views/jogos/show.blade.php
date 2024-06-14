<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalhes Jogo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Detalhes do Jogo</h1>
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
        <a href="{{ route('jogos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
<script src="https://stackpath.boostrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script> 
</body>
</html>