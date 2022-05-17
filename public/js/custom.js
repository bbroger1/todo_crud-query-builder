document.getElementById('modal_delete').addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var id = button.getAttribute('data-bs-whatever');
    var input = document.getElementById('task_id');
    input.value = id;
    document.querySelector('#form_delete').setAttribute('action', "tasks/delete/" + id);
})
