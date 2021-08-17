<?php
    // realizando as importações
    require_once('funcoes.php');
    // importando o cabeçalho padrão
    include(HEADER_TEMPLATE);
?>
    <hr/>
    <h1>Exemplo Layout</h1>
    <hr/>
    <form >
        <div class="container">
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-3">
                    <label for="">Nome</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Sobrenome</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group col-md-3"></div>
            </div>
            <div class="form-row justify-content-center align-items-center">
                <div class="form-group col-md-4">
                    <label for="">Gênero</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Estado</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Cidade</label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
    </form>
<?php
    // importando o rodapé padrão
    include(FOOTER_TEMPLATE);
?>