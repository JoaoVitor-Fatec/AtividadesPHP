<?php

require __DIR__ . "/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', function () {
    return "Olá mundo!";
});

$r->get('/olapessoa/{nome}', function ($params) {
    return 'Olá ' . $params[1];
});

$r->get('/exer1/formulario', function () {
    include ("exer1.html");
});

$r->post('/exer1/resposta', function () {
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "a soma é :" . $soma;
});

# Lista 

/*

# Exercicio 1
$r->get('/exer1/formulario', function(){
    include("ex1.html");
});
$r->post('/exer1/resposta', function($params){
    $numero = $_POST['numero'];

    if ($numero > 0) {
        return "Valor Positivo";
    } elseif ($numero < 0) {
        return "Valor Negativo";
    } else {
        return "Igual a Zero";
    }
});

# Exercicio 2
$r->get('/exer2/formulario', function(){
    include("ex2.html");
});
$r->post('/exer2/resposta', function($params){
    $numeros = $_POST['numeros'];
    $numeros_array = explode(",", $numeros);
    $menor_valor = min($numeros_array);
    $posicao_menor = array_search($menor_valor, $numeros_array);
    return "O menor valor é $menor_valor e está na posição $posicao_menor na sequência.";
});

# Exercicio 3
$r->get('/exer3/formulario', function(){
    include("ex3.html");
});
$r->post('/exer3/resposta', function($params){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;

    if ($valor1 == $valor2) {
        return "O triplo da soma é: " . (3 * $soma);
    } else {
        return "A soma é: {$soma}";
    }
});

# Exercicio 4
$r->get('/exer4/formulario', function(){
    include("ex4.html");
});
$r->post('/exer4/resposta', function($params){
    $numero = $_POST['numero'];
    $tabuada = "";
    for ($i = 0; $i <= 10; $i++) {
        $tabuada .= "$numero X $i = " . ($numero * $i) . "<br>";
    }
    return $tabuada;
});

# Exercicio 5
$r->get('/exer5/formulario', function(){
    include("ex5.html");
});
$r->post('/exer5/resposta', function($params){
    $numero = $_POST['numero'];
    $fatorial = 1;
    for ($i = $numero; $i > 1; $i--) {
        $fatorial *= $i;
    }
    return "O fatorial de $numero é: $fatorial";
});

# Exercicio 6
$r->get('/exer6/formulario', function(){
    include("ex6.html");
});
$r->post('/exer6/resposta', function($params){
    $a = $_POST['a'];
    $b = $_POST['b'];

    if ($a < $b) {
        return "$a $b";
    } elseif ($a > $b) {
        return "$b $a";
    } else {
        return "Números iguais: $a";
    }
});

# Exercicio 7
$r->get('/exer7/formulario', function(){
    include("ex7.html");
});
$r->post('/exer7/resposta', function($params){
    $metros = $_POST['metros'];
    $centimetros = $metros * 100;
    return "$metros metros equivalem a $centimetros centímetros.";
});

# Exercicio 8
$r->get('/exer8/formulario', function(){
    include("ex8.html");
});
$r->post('/exer8/resposta', function($params){
    $metros_quadrados = $_POST['metros_quadrados'];
    $litros_tinta = $metros_quadrados / 3;
    $quantidade_latas = ceil($litros_tinta / 18); 
    $preco_total = $quantidade_latas * 80; 

    return "Quantidade de latas de tinta necessárias: $quantidade_latas<br>Preço total: R$ $preco_total";
});

# Exercicio 9
$r->get('/exer9/formulario', function(){
    include("ex9.html");
});
$r->post('/exer9/resposta', function($params){
    $ano_nascimento = $_POST['ano_nascimento'];
    $ano_atual = date("Y");
    $idade = $ano_atual - $ano_nascimento;
    $dias_vividos = $idade * 365;
    $idade_2025 = 2025 - $ano_nascimento;

    return "a) Idade: $idade anos<br>b) Dias vividos: $dias_vividos dias<br>c) Idade em 2025: $idade_2025 anos";
});

# Exercicio 10
$r->get('/exer10/formulario', function(){
    include("ex10.html");
});

$r->post('/exer10/resposta', function($params){
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    $imc = $peso / ($altura * $altura);
    if ($imc < 18.5) {
        $resultado = "Abaixo do peso";
    } elseif ($imc >= 18.5 && $imc < 24.9) {
        $resultado = "Peso normal";
    } elseif ($imc >= 25 && $imc < 29.9) {
        $resultado = "Acima do peso";
    } else {
        $resultado = "Obesidade";
    }

    return "Seu IMC é: " . number_format($imc, 2) . ". Você está classificado como: $resultado";
});

*/

//Chamando o formulário para inserir categoria
$r->get('/categoria/inserir',
    'Php\Primeiroprojeto\Controllers\CategoriaController@inserir');

$r->post('/categoria/novo',
    'Php\Primeiroprojeto\Controllers\CategoriaController@novo');

$r->get('/categoria', 
    'Php\Primeiroprojeto\Controllers\CategoriaController@index');

$r->get('/categoria/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\CategoriaController@index');

$r->get('/categoria/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\CategoriaController@alterar');

$r->get('/categoria/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\CategoriaController@excluir');

$r->post('/categoria/editar',
    'Php\Primeiroprojeto\Controllers\CategoriaController@editar');

$r->post('/categoria/deletar',
    'Php\Primeiroprojeto\Controllers\CategoriaController@deletar');
    
//Chamando o formulário para inserir Alunos
$r->get('/alunos/inserir',
    'Php\Primeiroprojeto\Controllers\AlunosController@inserir');
$r->post('/alunos/novo',
    'Php\Primeiroprojeto\Controllers\AlunosController@novo');

$r->get('/alunos', 
    'Php\Primeiroprojeto\Controllers\AlunosController@index');

$r->get('/alunos/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\AlunosController@index');

$r->get('/alunos/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\AlunosController@alterar');

$r->get('/alunos/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\AlunosController@excluir');

$r->post('/alunos/editar',
    'Php\Primeiroprojeto\Controllers\AlunosController@editar');

$r->post('/alunos/deletar',
    'Php\Primeiroprojeto\Controllers\AlunosController@deletar');

//Chamando o formulário para inserir Cursos
$r->get('/curso/inserir',
    'Php\Primeiroprojeto\Controllers\CursoController@inserir');
$r->post('/curso/novo',
    'Php\Primeiroprojeto\Controllers\CursoController@novo');

$r->get('/curso', 
    'Php\Primeiroprojeto\Controllers\CursoController@index');

$r->get('/curso/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\CursoController@index');

$r->get('/curso/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\CursoController@alterar');

$r->get('/curso/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\CursoController@excluir');

$r->post('/curso/editar',
    'Php\Primeiroprojeto\Controllers\CursoController@editar');

$r->post('/curso/deletar',
    'Php\Primeiroprojeto\Controllers\CursoController@deletar');


//Chamando o formulário para inserir Funcionarios
$r->get('/funcionarios/inserir',
    'Php\Primeiroprojeto\Controllers\FuncionariosController@inserir');

$r->post('/funcionarios/novo',
    'Php\Primeiroprojeto\Controllers\FuncionariosController@novo');

$r->get('/funcionarios', 
    'Php\Primeiroprojeto\Controllers\FuncionariosController@index');

$r->get('/funcionarios/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\FuncionariosController@index');

$r->get('/funcionarios/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\FuncionariosController@alterar');

$r->get('/funcionarios/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\FuncionariosController@excluir');

$r->post('/funcionarios/editar',
    'Php\Primeiroprojeto\Controllers\FuncionariosController@editar');

$r->post('/funcionarios/deletar',
    'Php\Primeiroprojeto\Controllers\FuncionariosController@deletar');

//Chamando o formulário para inserir Professores
$r->get('/professores/inserir',
    'Php\Primeiroprojeto\Controllers\ProfessorController@inserir');

$r->post('/professores/novo',
    'Php\Primeiroprojeto\Controllers\ProfessorController@novo');

$r->get('/professores', 
    'Php\Primeiroprojeto\Controllers\ProfessorController@index');

$r->get('/professores/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\ProfessorController@index');

$r->get('/professores/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\ProfessorController@alterar');

$r->get('/professores/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\ProfessorController@excluir');

$r->post('/professores/editar',
    'Php\Primeiroprojeto\Controllers\ProfessorController@editar');

$r->post('/professores/deletar',
    'Php\Primeiroprojeto\Controllers\ProfessorController@deletar');

#ROTAS

$resultado = $r->handler();
 
if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}
 
if ($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}


