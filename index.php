<?php
if (!isset($_SESSION['id_user'])) {
    header('Location: http://localhost/esbi/public/auth/login');
    exit;
};
