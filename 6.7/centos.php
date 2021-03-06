<?php

$distroversion = basename(__DIR__);
$release = $_GET['release'];
$arch = $_GET['arch'];
$repo = $_GET['repo'];

// Validate release number against $distroversion
$valid_release = $release === preg_replace('/(\.\d+)+$/', '', $distroversion);
$valid_arch = in_array($arch, array('x86_64'));
$valid_repo = in_array($repo, array('os', 'updates'));

if( ! $valid_release || ! $valid_arch || ! $valid_repo ) {
    header("HTTP/1.0 404 Not Found");
    exit(1);
}

echo "http://vault.centos.org/$distroversion/$repo/$arch\n";

