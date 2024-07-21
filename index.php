<?php
define('ROOT',  $_SERVER['DOCUMENT_ROOT']);
define('CURRENT_DOMAIN', current_domain() );

// echo ROOT;
require_once 'template/layout/header.php';

function asset($src) {
    // Check if the 'public/' part is already included at the beginning of the $src
    if (strpos($src, 'public/') !== 0) {
        // If not, prepend it
        $src = 'public/' . $src;
    }

    // Assuming CURRENT_DOMAIN is defined and contains the base URL of your site
    $domain = rtrim(CURRENT_DOMAIN, '/'); // Ensure there's no trailing slash

    // Generate the full URL to the asset
    $assetUrl = $domain . '/' . ltrim($src, '/'); // Ensure there's no leading slash to avoid double slashes

    return $assetUrl;
}


function protocol()
{
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0 ? 'https://' : 'http://';
}

function current_domain()
{
    $app_env = getenv('APP_ENV');
    if($app_env == 'docker') {
        // For production or other environments, use the standard domain
        return protocol() . $_SERVER['HTTP_HOST'];
    }
    // Check if running in a local environment like XAMPP
    else {
        // Customize the port and directory name as per your XAMPP configuration
        return protocol() . $_SERVER['HTTP_HOST'] . '/PHP_Book_Ecommerce';
    } 
}
?>
