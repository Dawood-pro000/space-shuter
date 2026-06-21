<?php
// templates/bootstrap.php
// Auto-detect a web-root-aware $ROOT_URL so templates resolve links correctly when included
// It strips common application subfolders (user, admin, api, auth) from the script path
$ROOT_URL = '/';
if (!empty($_SERVER['SCRIPT_NAME'])) {
    $scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
    // remove known subfolders if present
    $root = preg_replace('#/(user|admin|api|auth)(/.*)?$#', '', $scriptDir);
    if ($root === '') {
        $root = '/';
    } else {
        // ensure leading slash
        if ($root[0] !== '/') $root = '/' . $root;
        $root .= '/';
    }
    $ROOT_URL = $ROOT;
}
// allow manual override from pages
if (isset($ROOT_URL) && !defined('ROOT_URL')) {
    // keep $ROOT_URL variable for templates
}
?>
