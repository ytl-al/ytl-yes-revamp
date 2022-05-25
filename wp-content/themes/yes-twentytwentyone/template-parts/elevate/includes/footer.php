<div class="modal fade" id="modal-alert" tabindex="-1" aria-labelledby="modal-alert" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="modal-titleLabel"></h5>
            </div>
            <div class="modal-body text-center">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.721 5.14645L2.42767 23.9998C2.19483 24.403 2.07163 24.8602 2.07032 25.3258C2.06902 25.7914 2.18966 26.2493 2.42024 26.6538C2.65082 27.0583 2.98331 27.3954 3.38461 27.6316C3.78592 27.8677 4.24207 27.9947 4.70767 27.9998H27.2943C27.7599 27.9947 28.2161 27.8677 28.6174 27.6316C29.0187 27.3954 29.3512 27.0583 29.5818 26.6538C29.8124 26.2493 29.933 25.7914 29.9317 25.3258C29.9304 24.8602 29.8072 24.403 29.5743 23.9998L18.281 5.14645C18.0433 4.75459 17.7086 4.43061 17.3093 4.20576C16.9099 3.98092 16.4593 3.86279 16.001 3.86279C15.5427 3.86279 15.0921 3.98092 14.6927 4.20576C14.2934 4.43061 13.9587 4.75459 13.721 5.14645V5.14645Z" stroke="#EF4444" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16 12V17.3333" stroke="#EF4444" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16 22.6665H16.0133" stroke="#EF4444" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <p id="modal-bodyText"></p>
            </div>
            <div class="modal-footer">
                <button id="modal-btnOk" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#modal-btnOk').click(function (){
       var cbFunction = $(this).data('callback');
       if(cbFunction){
           eval(cbFunction);
       }
    });
    function toggleModalAlert(modalHeader = '', modalText = '', cb='') {

        $('#modal-btnOk').data('callback',cb);
        $('#modal-titleLabel').html(modalHeader);
        $('#modal-bodyText').html(modalText);
        $('#modal-alert').modal('show');
        $('#modal-alert').on('hidden.bs.modal', function() {
            $('#modal-titleLabel').html('');
            $('#modal-bodyText').html('');
        });
    }
</script>
<?php get_footer('elevate'); ?>