<div class="modal" id="modal_delete" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <p>Confirma a exclusão da tarefa?</p>
            </div>
            <div class="modal-footer">
                <form action="" method="POST" id="form_delete">
                    @csrf
                    <input type="hidden" name="task_id" id="task_id" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="input" name="btn_task_delete" id="btn_task_delete" class="btn btn-danger">Sim</button>
                </form>
            </div>
        </div>
    </div>
</div>
