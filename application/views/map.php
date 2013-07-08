<!DOCTYPE html>
<html>
<head>

<title><?php echo $this->lang->line('website_title'); ?></title>
<base href="<?php echo base_url(); ?>" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" />
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>


	<meta charset="utf-8" />
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

#map-canvas, #map_canvas {
  height: 650px;
  width: 100%;
}
</style>
</head>
<body onload="initialize()">
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
	<div style='height:20px;'></div>  
 <div id="map-canvas"></div>
    <div>
<script>

var markers = Array();
var map;
var bounds;
function initialize() {
  var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
  var mapOptions = {
    zoom: 4,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
   map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
 bounds = new google.maps.LatLngBounds();
<? 
$i=0;
foreach($locations as $loc){?>
  var myLatlng<?=$i?> = new google.maps.LatLng(<?=$loc['lat']?>,<?=$loc['lng']?>);
  bounds.extend (myLatlng<?=$i?>);
  var marker<?=$i?> = new google.maps.Marker({
      position: myLatlng<?=$i?>,
      map: map,
      title: '<?=$loc['name']?>'
  });
<? } ?>
map.fitBounds(bounds);
}
google.maps.event.addDomListener(window, 'load', initialize);

    </script>

	</div>
<?php echo $this->load->view('footer'); ?>
</body>
</html>
