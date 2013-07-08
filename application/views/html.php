<!DOCTYPE html>
<html>
<head>

<title><?php echo $this->lang->line('website_title'); ?></title>
<base href="<?php echo base_url(); ?>" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" />
<link type="text/css" rel="stylesheet" href="resource/css/960gs/960gs.css" />
<link type="text/css" rel="stylesheet" href="resource/css/style.css" />



	<meta charset="utf-8" />
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
</style>
</head>
<body>
<div id="header">
        <div class="container_12">
        <div class="grid_8">
            <h1>Situated Learning Geo Framework</h1>
        </div>
        <div class="grid_4">
            <ul id="top_menu">
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div id="content">
    <div class="container_12">
        <div class="grid_12">

	<div>
	            <a href='<?php echo site_url('Framework/users')?>'>Users</a> |
                <a href='<?php echo site_url('Framework/user_group')?>'>Groups</a> |
                <a href='<?php echo site_url('Framework/activity')?>'>Activities</a> |
                <a href='<?php echo site_url('Framework/activity_group')?>'>Activity-Group</a> |
                <a href='<?php echo site_url('Framework/activity_location')?>'>Activities locations</a> |
                <a href='<?php echo site_url('map/activity_location')?>'>Activities Map</a> |
                <a href='<?php echo site_url('Framework/user_location')?>'>Users locations</a> |
                <a href='<?php echo site_url('map/user_location')?>'>Users Map</a> |

	</div>
		<?php echo $output; ?>
    </div>
<?php echo $this->load->view('footer'); ?>

    </div>
    </div>
    </div>
</body>
</html>
