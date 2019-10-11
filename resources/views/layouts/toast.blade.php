<div
    aria-live="polite"
    aria-atomic="true"
    style="position: fixed; top: 60px; right: 10px; min-width: 300px; z-index: 9999;">
    <div
        class="toast shadow-sm rounded my-2 bg-secondary"
        data-autohide="false"
        style="position: absolute; top: 0; right: 0;">
        <div class="toast-header">
            <strong class="mr-auto">Netfreak</strong>
            <small>Just now</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body text-light" id="toast-body" style="min-width: 300px;">
        </div>
    </div>
</div>
<script>
function showToast(text = "Hello, learner!!")
{
    document.getElementById("toast-body").innerHTML = text;
    $(".toast").toast("show");
    setTimeout(function () { $(".toast").toast("hide"); }, 4500);
}
</script>
