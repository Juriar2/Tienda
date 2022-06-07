<?php

//Configuración del sistema
define("SITE_URL", "http://localhost/tienda_online");
define("KEY_TOKEN", "TU_TOKEN");
define("MONEDA", "$");

//Configuración para Paypal
define("CLIENT_ID","AbBlinnDeszD-pG1qgf58FcLI5BT2Shctk6XdDJfyGMBxVrxhUBgjzmnjNnmCHv1T-E5ZmRGm9rBjlcs");
define("CURRENCY", "MXN");

//Configuración para Mercado Pago
define("TOKEN_MP", "TEST-1326276405384390-012718-86ac02d94aa43012a9b12dd6b9314ed6-432404876");
define("PUBLIC_KEY_MP", "TEST-f3d92e33-f09a-4098-9423-d52890da6041");
define("LOCALE_MP", "es-MX");


//Datos para envio de correo electronico
define("MAIL_HOST", "mail.dominio.com");
define("MAIL_USER", "tu_correo@dominio.com");
define("MAIL_PASS", "tu_password");
define("MAIL_PORT", "tu_puerto");

session_start();

$num_cart = 0;
if (isset($_SESSION['carrito']['productos'])) {
    $num_cart = count($_SESSION['carrito']['productos']);
}
