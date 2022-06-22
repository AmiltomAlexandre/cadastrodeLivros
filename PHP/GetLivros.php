<?php
    //echo "Script de leitura de dados";
    //conexão com o banco de dados
    $dbHost = "localhost:3306";//3306 onde está o banco de dados
    $dbUser = "root";
    $dbPassword = ""; //'ifsp'
    $dbName = "cadastroLivraria";

    $connection = mysqli_connect($dbHost,$dbUser,$dbPassword, $dbName);

    if($connection){
        //echo "<br />Conexão efetuada com sucesso! ";
        //Realizar a leitura do banco
        $query = "select * from cadastro";
        $results = mysqli_query($connection, $query);
        //var_dump($results);
        //Entregar os dados para quem pediu

        $Livros = [];
        $index = 0;

        while($record = mysqli_fetch_row($results)){
            //var_dump ($record);
            $Livro = new stdClass(); //criando um objeto
            $Livro->idAutor = $record[0];
            $Livro->nomeLivro = $record[1];
            $Livro->nomeAutor = $record[2];
            $Livro->numeroPaginas = $record[3];
            $Livro->urlImagem = $record[4];
            $Livros[$index] = $Livro;
            $index = $index +1;

        }
        echo json_encode($Livros);

    }else{
        echo "<br />Conxão não efetuada!";
        echo "<br />". mysqli_connect_error();

    }

?>