<div class="modal fade" id="editar-categoria-modal" tabindex="-1" aria-labelledby="editar-categoria-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Atualizar categoria</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                    </div>
                </div>
            </div>

            <form action="" method="POST">
                <div class="form">
                    <div class="input-nome-categoria">
                        <label for="nomecategoria">Nome da categoria</label>
                        <input type="text" name="nomecategoria" oninput="validaInput(this)" placeholder="Brinquedos" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal">
                        Cancelar
                        <img src="../public/img/block-icon.svg" alt="Cancelar">
                    </button>
                    <button type="submit" class="submit">
                        Atualizar
                        <img src="../public/img/check-icon.svg" alt="Atualizar">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>