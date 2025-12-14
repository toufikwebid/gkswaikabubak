<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://mail.gkswaikabubak.com'; // Menggunakan SSL
$config['smtp_user'] = 'admin@gkswaikabubak.com'; // Username email Anda
$config['smtp_pass'] = '@GKSwkb25'; // Password email Anda
$config['smtp_port'] = 465; // Port SSL
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['wordwrap'] = TRUE;
$config['smtp_crypto'] = 'ssl'; // Menambahkan kriptografi SSL
