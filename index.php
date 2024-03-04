<?php
if (!isset($_SESSION['id_user'])) {
    header('Location: http://localhost/esbi/public/auth/login');
    exit;
};

// if (!isset($_SESSION['id_user'])) {
//     header('Location: https://abellnet.my.id/esbi/public');
//     exit;
// };
