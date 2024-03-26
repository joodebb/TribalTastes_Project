<?php 

function get_root_path() {

  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
  // Get the host
  $host = $_SERVER['HTTP_HOST'];
  // Construct and return the root path
  return $protocol . '://' . $host;
}