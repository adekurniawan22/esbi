<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/style.css">
    <!-- Memuat jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <div class="container register-container">
        <div class="register-content">
            <img src="https://via.placeholder.com/300" alt="Placeholder Image" class="register-img">
            <div class="register-form">
                <h2>Register</h2>
                <form action="<?php echo BASEURL; ?>/auth/proses_register" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <input type="text" class="form-control " name="nama" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control " name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control " name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn col-12 btn-primary" name="register">Register</button>
                </form>
                <div class="login-link">
                    <a href="<?= BASEURL ?>/auth/login">Sudah punya akun? Login di sini</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="pesanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Pesan</h3>
                </div>
                <div class="modal-body">
                    <?php if (isset($_SESSION['pesan'])) echo $_SESSION['pesan']; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            <?php if (isset($_SESSION['pesan'])) : ?>
                $('#pesanModal').modal('show');
                <?php unset($_SESSION['pesan']); ?>
            <?php endif; ?>
        });
    </script>
</body>

</html>