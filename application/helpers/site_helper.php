<?php

if ( ! function_exists('debug')) {
    function debug ($str,$die=FALSE) {
        echo '<pre>';
        print_r($str);
        echo '</pre>';
        if ($die) die();
    }
}

/**
 * Dump a variable, wrapped in <pre> tags.
 * @param mixed $var The variable to dump.
 * @param string $label (optional) A label to prepend the dump with.
 * @param boolean $echo (optional) Whether to echo the variable or return it
 * @global
 * @return mixed Return if $echo is passed as FALSE
 * @author Joost van Veen
 */
function dump ($var, $label = 'Dump', $echo = TRUE)
{
    // Store dump in variable
    ob_start();
    var_dump($var);
    $output = ob_get_clean();

    // Add formatting
    $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
    $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

    // Output
    if ($echo == TRUE) {
        echo $output;
    }
    else {
        return $output;
    }
}

if ( ! function_exists('debug_query')) {
    function debug_query ($die=FALSE) {
        $TO =& get_instance();
        echo '<strong>';
        echo $TO->db->last_query();
        echo '</strong>';
        if ($die) die();
    }
}

if ( ! function_exists('admin_assets')) {
    function admin_assets () {
        $TO =& get_instance();
        return $TO->config->config['admin_assets'];
    }
}

if ( ! function_exists('js_assets')) {
    function js_assets () {
        $TO =& get_instance();
        return $TO->config->config['js_assets'];
    }
}

if ( ! function_exists('css_assets')) {
    function css_assets () {
        $TO =& get_instance();
        return $TO->config->config['css_assets'];
    }
}

if ( ! function_exists('img_assets')) {
    function img_assets () {
        $TO =& get_instance();
        return $TO->config->config['img_assets'];
    }
}

if ( ! function_exists('base64_url_decode')) {
    function base64_url_decode ($input) {
        return base64_decode(strtr($input, '-_', '+/'));
    }
}

if ( ! function_exists('set_message')) {
    function set_message ($value,$name='info') {
        $TO =& get_instance();
        return $TO->session->set_flashdata($name,$value);
        // return $TO->session->keep_flashdata($name);
    }
}

if ( ! function_exists('get_message')) {
    function get_message ($name='info') {
        $TO =& get_instance();
        return $TO->session->flashdata($name);
    }
}

if ( ! function_exists('session')) {
    function session ($name) {
        $TO =& get_instance();
        return $TO->session->userdata($name);
    }
}

if ( ! function_exists('set_session')) {
    function set_session ($name,$value) {
        $TO =& get_instance();
        return $TO->session->set_userdata($name,$value);
    }
}

if (! function_exists('is_get')) {
    function is_get () {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }
}

// facebook
if ( ! function_exists('parse_signed_request')) {
    function parse_signed_request($signed_request, $secret) {
        list($encoded_sig, $payload) = explode('.', $signed_request, 2);

        // decode the data
        $sig = base64_url_decode($encoded_sig);
        $data = json_decode(base64_url_decode($payload), true);

        if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
            // error_log('Unknown algorithm. Expected HMAC-SHA256');
            return null;
        }

        // check sig
        $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
        if ($sig !== $expected_sig) {
            // error_log('Bad Signed JSON signature!');
            return null;
        }

        return $data;
    }
}
