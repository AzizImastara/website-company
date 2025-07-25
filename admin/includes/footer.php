            <footer class="mt-5 pt-4 border-top">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="text-muted">&copy; <?php echo date('Y'); ?> Website Company Admin Panel. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto hide alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert-dismissible');
        alerts.forEach(function(alert) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);

    // Confirm delete
    function confirmDelete(message = 'Apakah Anda yakin ingin menghapus data ini?') {
        return confirm(message);
    }

    // Preview gambar sebelum upload
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
                document.getElementById(previewId).style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>
