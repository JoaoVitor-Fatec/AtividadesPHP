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
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <?php echo e($message); ?>

        </div>
    <?php endif; ?>
    <a href="<?php echo e(route('jogos.create')); ?>" class="btn btn-success mb-3">Adicionar Jogo</a>
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
            <?php $__currentLoopData = $jogos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jogo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($jogo->id); ?></td>
                    <td><?php echo e($jogo->nome); ?></td>
                    <td><?php echo e($jogo->empresa); ?></td>
                    <td><?php echo e($jogo->genero); ?></td>
                    <td><?php echo e($jogo->indicacao); ?></td>
                    <td>
                        <a href="<?php echo e(route('jogos.show', $jogo->id)); ?>" class="btn btn-info">Ver</a>
                        <a href="<?php echo e(route('jogos.edit', $jogo->id)); ?>" class="btn btn-primary">Editar</a>
                        <form action="<?php echo e(route('jogos.destroy', $jogo->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<script src="https://stackpath.boostrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH D:\Faculdade\LaravelJogos\LaravelJogos\resources\views/jogos/index.blade.php ENDPATH**/ ?>