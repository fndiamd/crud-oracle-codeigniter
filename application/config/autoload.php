<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

// Load library yang penting (database, session, form_validation *jika menggunakan validasi)
$autoload['libraries'] = array('database', 'session', 'form_validation');
$autoload['drivers'] = array();

// Load helper yang bakal sering digunakan (url, file *jika ada upload gambar, file dll)
$autoload['helper'] = array('url', 'file');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array();
