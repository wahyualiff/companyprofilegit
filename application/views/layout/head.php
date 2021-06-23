<?php
// Site dari konfigurasi
$site_info = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!-- icon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/thumbs/' . $site_info->icon) ?>">
    <!-- description -->
    <meta name="description" content="<?php echo $deskripsi ?>">
    <!-- keyword -->
    <meta name="keywords" content="<?php echo $title . ', ' . $keywords ?>">
    <!-- author -->
    <meta name="author" content="<?php echo $title ?>">
    <!-- css bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/bootstrap.min.css">
    <!-- css sendiri -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/font-awesome/css/font-awesome.min.css">
</head>

<body>