<?php
    echo 'Script para receber e armazenar as obras';
    
    $nomeLivro = $_GET['nomeLivro'];
    $nomeAutor = $_GET['nomeAutor'];
    $numeroPaginas = $_GET['numeroPaginas'];
    $urlImagem = $_GET['urlImagem'];

    //conexão com o banco de dados
    $hostname = 'localhost:3306';//3306
    $user = 'root';
    $password = ''; //'ifsp'
    $database = 'cadastroLivraria';

    $conn = mysqli_connect($hostname, $user, $password, $database);
    if($conn){
        echo 'Conexão com o banco efetuada com sucesso!!!';
        //Gravar os dados no banco de dados
        $query = "insert into cadastro(nomeLivro,nomeAutor, numeroPaginas, urlImagem,) 
        values ('".$nomeLivro."','".$nomeAutor."','".$numeroPaginas."','".$urlImagem."');";

        echo '<br />'.$query;
        $res = mysqli_query($conn, $query);

        if($res){
            echo '<h2>Obra incluida com sucesso!!!</h2>';   
            header("Location:".$_SERVER['HTTP_REFERER']);
            
            //var_dump($_SERVER['HTTP_REFERER']);
            //header("Location:http://127.0.0.1:5500/index.html");
        }
            
        else{
            echo '<h2>Obra não incluida.</h2>';
        }
        
       
    }else{
        echo 'Conexão com o banco de dados não efetuada!!! <br />';
        echo mysqli_connect_error();
    }