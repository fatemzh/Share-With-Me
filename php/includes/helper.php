<?php
// L'accès à la page n'est autorisée que si un utilisateur est connecté, sinon il reçoit une erreur 403
function IsUserAllowed() {
    if (!$_SESSION["isConnected"]) {
        http_response_code(403);
        die();
    }
}
?>
