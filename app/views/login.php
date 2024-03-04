<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/style.css">

</head>

<body>

    <div class="container login-container">
        <div class="login-content">
            <img src="<?= BASEURL; ?>/img/banner.jpg" alt="Placeholder Image" class="login-img">
            <div class="login-form">
                <h2>Login</h2>
                <form action="<?php echo BASEURL; ?>/auth/proses_login" method="post">
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn col-12 btn-primary" name="login">Login</button>
                </form>
                <div class="register-link">
                    <a href="<?= BASEURL ?>/auth/register">Belum punya akun? Daftar di sini</a>
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