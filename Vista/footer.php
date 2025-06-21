    <!-- Script de SweetAlert -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if (isset($_GET['mensaje']) && isset($mensajes[$_GET['mensaje']])): ?>
            Swal.fire({
                icon: '<?= $mensajes[$_GET['mensaje']][0] ?>',
                title: '<?= $mensajes[$_GET['mensaje']][1] ?>',
                showConfirmButton: false,
                timer: 2500
            });
            // Limpia la URL sin recargar
            // if (window.history.replaceState) {
            //     window.history.replaceState(null, null, window.location.pathname);
            // }
        <?php endif; ?>
    });
</script>
<script defer src="js/ajax.js"></script>
    <script src="js/generalidades.js"></script>
</body>
</html>