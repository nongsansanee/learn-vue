<!-- Modal -->
<div class="modal fade" id="modal-sms" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Netfreak says 👋</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-sms-body">
            </div>
            <div class="modal-footer">
                <div class="mx-auto">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">👌</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function showModalSms(text = "Hello, learner!!")
{
    document.getElementById("modal-sms-body").innerHTML = text;
    $("#modal-sms").modal("show");
}
</script>
