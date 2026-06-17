<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h6 class="modal-title" id="logoutModalLabel">Confirm logout</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-size:13px;color:var(--text-muted);">
                Are you sure you want to log out of your session?
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal" style="border-radius:8px;border-color:var(--border);color:var(--text-muted);">Cancel</button>
                <button type="button" class="btn btn-sm btn-danger" id="confirmLogout" style="border-radius:8px;">Log out</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const logoutForm = document.createElement('form');
    logoutForm.method = 'POST';
    logoutForm.action = '{{ route("logout") }}';
    logoutForm.innerHTML = '<input type="hidden" name="_token" value="' + document.querySelector('meta[name="csrf-token"]').getAttribute('content') + '">';
    document.body.appendChild(logoutForm);

    document.querySelectorAll('.logout-link').forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('logoutModal'));
            modal.show();
        });
    });

    document.getElementById('confirmLogout')?.addEventListener('click', () => logoutForm.submit());
});
</script>
