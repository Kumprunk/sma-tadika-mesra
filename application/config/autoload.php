<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'email', 'session', 'form_validation');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'file', 'security', 'tcx');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array(
    'Mcustom',
    'Mdashboard',
    'Msiswa',
    'Msiswalog',
    'Muser',
    'Muserlog',
    'Mguru',
    'Mtagihan',
    'Mgurulog'
);
