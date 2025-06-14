<?php
function generarTokenCSRF()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // 64 caracteres seguros
    }
    return $_SESSION['csrf_token'];
}
function validarTokenCSRF($tokenEnviado)
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $tokenEnviado);
}
