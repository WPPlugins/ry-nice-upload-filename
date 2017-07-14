<?php/*Plugin Name: RY Nice Upload FileNamePlugin URI: https://richer.tw/ry-nice-upload-filenameDescription: Rewrite upload filename if not english or number letterVersion: 1.0.1Author: Richer YangAuthor URI: https://richer.tw/License: MIT License  License URI: http://opensource.org/licenses/MIT*/function_exists('plugin_dir_url') OR exit('No direct script access allowed');define('RY_NUFN_VERSION', '1.0.1');add_filter('sanitize_file_name', 'RY_NUFN_sanitize_file_name');function RY_NUFN_sanitize_file_name($file_name) {    $parts = explode('.', $file_name);    if( preg_match('@^[a-z0-9][a-z0-9\-_]*$@i', $parts[0]) ) {        $file_name = $parts[0];    } else {        $file_name = substr(md5($parts[0]), 0, 10);    }    if( count($parts) < 2 ) {        return $file_name;    } else {        $extension = array_pop($parts);        return $file_name . '.' . $extension;    }}