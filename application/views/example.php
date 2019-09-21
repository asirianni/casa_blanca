<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body>
	<div>
                <a href='<?php echo site_url('welcome/adm_textos')?>'>Slider Textos Home</a> | 
                <a href='<?php echo site_url('welcome/adm_nosotros')?>'>Nosotros</a> |
		<a href='<?php echo site_url('welcome/adm_productos')?>'>Productos Destacados</a> |
		<a href='<?php echo site_url('welcome/adm_marcas')?>'>Marcas</a> |
                <a href='<?php echo site_url('welcome/adm_configuraciones')?>'>Configuracion</a> | 
		<a href='<?php echo site_url('welcome/cerrar')?>'>Cerrar</a> | 
	</div>
	<div style='height:20px;'></div>  
        <div style="padding: 10px">
            <H1><?php echo $this->session->userdata('title'); ?></H1>
            <?php echo $output; ?>
        </div>
        <?php foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
</body>
</html>
