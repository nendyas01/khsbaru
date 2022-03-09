<?php
ini_set('session.gc_maxlifetime', 30 * 60);
session_start();
include_once('lib/head.php');
include_once("lib/check.php");
include_once("lib/function.php");


$surat_ijin_no    = $_POST['var_no_surat_ptsp'];
$tgl_survey        = date('Y-m-d', strtotime($_POST['var_tgl_survey']));
$hasil_survey    = $_POST['var_hasil_survey'];
$status            = $_POST['option_persetujuan'];
