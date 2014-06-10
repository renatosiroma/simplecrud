<?
    $id = (isset($_GET['id'])) ? $_GET['id'] : false;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $retorno = $controller->salvar_post($id);
        
        echo '<div><p>'.implode('<br>', $retorno['mensagem']).'</p></div>';
    }
    
    if($id){
        $dados = $controller->getDados($id);
        
        if($dados['falha']){
            echo '<div><p>'.implode('<br>', $dados['mensagem']).'</p></div>';
        }
    }
    
?>

<form action="" method="post">
    <fieldset>
        <label>Nome</label>
        <input type="text" name="nome" value="<?=($_SERVER['REQUEST_METHOD'] == 'POST' and (isset($retorno) and $retorno['falha'] == true)) ? $_POST['nome'] : (isset($dados) and isset($dados['data'])) ? $dados['data']['nome'] :  '';?>"/>
    </fieldset>
    <fieldset>
        <label>Profissão</label>
        <input type="text" name="profissao" value="<?=($_SERVER['REQUEST_METHOD'] == 'POST' and (isset($retorno) and $retorno['falha'] == true)) ? $_POST['profissao'] : (isset($dados) and isset($dados['data'])) ? $dados['data']['profissao'] :  '';?>"/>
    </fieldset>
    <fieldset>
        <input type="submit" value="Enviar"/>
        <br />
        <input type="reset" value="Limpar" />
    </fieldset>
</form>