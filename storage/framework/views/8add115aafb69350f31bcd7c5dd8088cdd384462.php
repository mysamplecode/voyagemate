<!DOCTYPE html>
<html>
<head>
    <?php if(\Route::current()->uri() == 'photo/single/{id}'): ?>
        <meta property="og:url" content="<?php echo e(url('photo/single/'.$photo->id)); ?>">
        <meta property="og:title" content="<?php echo e($photo->title); ?>" />
        <meta property="og:description" content="<?php echo e($photo->description); ?>" />
        <meta property="og:image" content="<?php echo e(url('public/images/uploads/'.$photo->user_id.'/medium/'.$photo->image)); ?>">
    <?php endif; ?>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo e($favicon); ?>">
    <title><?php echo e(Helpers::meta((!isset($exception)) ? \Route::current()->uri() : '', 'title')); ?> <?php echo e(isset($additional_title) ? $additional_title : ''); ?></title>
    <meta name="description" content="<?php echo e(Helpers::meta((!isset($exception)) ? Route::current()->uri() : '', 'description')); ?>">
    <meta name="keywords" content="<?php echo e(Helpers::meta((!isset($exception)) ? Route::current()->uri() : '', 'keywords')); ?>">
    
    <meta name="mobile-web-app-capable" content="yes">    
    
    <link href="<?php echo e(url('public/front/plugin/light-gallary/css/lightgallery.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(url('public/front/plugin/light-gallary/css/lg-fb-comment-box.css')); ?>" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo e(url('public/front/css/jquery.flex-images.css')); ?>" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo e(url('public/front/css/select2.css')); ?>" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo e(url('public/front/css/dropzone.css')); ?>" type="text/css" rel="stylesheet" />
	<link href="<?php echo e(url('public/front/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(url('public/front/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css" /> 
	<link href="<?php echo e(url('public/front/css/style.css')); ?>" rel="stylesheet" type="text/css" /> 
    
</head>
	<script src="<?php echo e(url('public/front/js/jquery.js')); ?>"></script>
	<script src="<?php echo e(url('public/front/js/bootstrap.js')); ?>"></script>