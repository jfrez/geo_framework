<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->lang->line('website_title'); ?></title>
<base href="<?php echo base_url(); ?>" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" />
<link type="text/css" rel="stylesheet" href="resource/css/960gs/960gs.css" />
<link type="text/css" rel="stylesheet" href="resource/css/style.css" />
</head>
<body>
<?php echo $this->load->view('header'); ?>
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

	</div>
        <div class="clear"></div>
    </div>
</div>
<?php echo $this->load->view('footer'); ?>
</body>
</html>
