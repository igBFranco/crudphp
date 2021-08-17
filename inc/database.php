<?php
    mysqli_report(MYSQLI_REPORT_STRICT);
    global $lastInsertID;

    /** criando a função para abrir a conexão com o banco de dados */
    function conectaMysql() {
        try {
            $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            $conn->set_charset('utf8');
            return $conn;
        }
        catch(Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /** criando a função para encerrar a conexão com o banco de dados */
    function desconectaMysql($conn) {
        try {
            mysqli_close($conn);
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    /** criando a função para pesquisar um registro em uma tabela baseando-se no ID 
     * ou retornar todos os registros de uma tabela específica **/
    function buscarRegistros($table = null, $chavePrimaria = null, $id = null) {
	    $database = conectaMysql();
	    $dados = null;
        try {
            /** o $id servirá para as consultas envolvendo registros específicos (pré-visualização e alteração) */
            if ($id) {
                $sql = "select * from $table where $chavePrimaria = $id";
                $result = $database->query($sql);

                if ($result->num_rows > 0) {
                    $dados = $result->fetch_array(MYSQLI_NUM);
                }
            }
            /** caso a função seja chamada sem receber o $id, servirá para retornar todos os registros */
            else {
                $sql = "select * from $table";
                $result = $database->query($sql);
                if ($result->num_rows > 0) {
                    $dados = $result->fetch_all(MYSQLI_NUM);
                }
            }
        }
        catch(Exception $e) {
            $_SESSION['message'] = $e->getMessage();
            $_SESSION['type'] = 'danger';
        }
        return $dados;
        desconectaMysql($database);
    }

    /** criando a função para salvar registros no banco de dados **/
    function salvar($table=null, $data=null) {
        $database = conectaMysql();
        $colunas = null;
        $valores = null;
        /** o laço de foreach abaixo vai quebrar todo o conteúdo da variável $data em partes para poder obter os nomes das colunas 
         * e os dados que deverão ser inseridos
        */
        foreach ($data as $key => $valor) {
            $colunas .= trim($key, "'") . ",";
            $valores .= "'$valor',";
        }
        // remove a ultima virgula
        $colunas = rtrim($colunas, ',');
        $valores = rtrim($valores, ',');
        
        $sql = "insert into $table($colunas) values ($valores);";
        try {
            $database->query($sql);
            $lastInsertId = $database->insert_id;
            $_SESSION['message'] = 'Registro cadastrado com sucesso!';
            $_SESSION['type'] = 'success';
        } 
        catch (Exception $e) {
            $_SESSION['message'] = 'Não foi possível realizar a operação!';
            $_SESSION['type'] = 'danger';
        } 
        desconectaMysql($database);
    }

    /** criando a função para editar registros no banco de dados **/
    function atualizar($table = null,$chavePrimaria = null, $id = null, $data = null) {
        $database = conectaMysql();
        $items = null;
        foreach ($data as $key => $valor) {
            $items .= trim($key, "'") . "='$valor',";
        }
        // remove a ultima virgula
        $items = rtrim($items, ',');
        $sql  = "update $table set $items where $chavePrimaria = $id";
        try {
            $database->query($sql);
            $_SESSION['message'] = 'Registro atualizado com sucesso!';
            $_SESSION['type'] = 'success';
        }
        catch (Exception $e) { 
            $_SESSION['message'] = 'Não foi possível realizar a operação!';
            $_SESSION['type'] = 'danger';
        } 
        desconectaMysql($database);
    }

    /** criando a função para editar registros no banco de dados **/
    function deletar($table = null,$chavePrimaria = null, $id = null) {
        $database = conectaMysql();
        $sql  = "delete from $table where $chavePrimaria = $id";
        try {
            $database->query($sql);
            $_SESSION['message'] = 'Registro apagado com sucesso!';
            $_SESSION['type'] = 'success';
        }
        catch (Exception $e) { 
            $_SESSION['message'] = 'Não foi possível realizar a operação!';
            $_SESSION['type'] = 'danger';
        } 
        desconectaMysql($database);
    }

?>