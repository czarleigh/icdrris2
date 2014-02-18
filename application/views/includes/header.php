<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
  <head>
		<title>Iligan City Disaster Response and Recovery Information System</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->

		<link rel="stylesheet" href="<?php echo base_url();?>application/views/css/style.css" type="text/css" media="screen">
                
        <!--<link href="<?php //echo base_url();?>css/bootstrap-glyphicons.css" rel="stylesheet">-->
                    
		<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
      

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="<?php echo base_url();?>application/views/js/map.js"></script>
		<script src="<?php echo base_url();?>application/views/js/dropdown.js"></script>
		<script src="<?php echo base_url();?>application/views/js/polygonScript.js"></script>
		<script src="<?php echo base_url();?>application/views/js/markerScript.js"></script>
		<script src="<?php echo base_url();?>application/views/js/verify.js"></script>
		<script src="<?php echo base_url();?>application/views/js/formSubmission.js"></script>
	
        
		<script src="<?php echo base_url();?>application/views/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>application/views/js/bootstrap-multiselect.js"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>application/views/css/bootstrap-multiselect.css" type="text/css"/>
		<link href="<?php echo base_url();?>application/views/css/bootstrap.css" rel="stylesheet" media="screen">
      	
               

				<style type = "text/css">
			#googlemap img,object,embed{max-width:none}
			#map_canvas embed{max-width:none}
			#map_canvas img{max-width:none}
			#map_canvas object{max-width:none}
		</style>

		<script type="text/javascript">
			$(document).ready(function(){
				$(".trigger").click(function(){
                                        $("#map_canvass").removeClass("span12");
					$("#map_canvass").addClass("span6"); //added
					$("#map_canvass").css({"float":"right"}); //added					
                                        lastCenter=map.getCenter(); 
                                        google.maps.event.trigger(map_canvas, 'resize');
                                        map.setCenter(lastCenter);
                                        $(".panel").toggle("fast");
					$(this).toggleClass("active");
					return false;
				});
				$(".trigger").click(function(){
					if (!$(this).hasClass("active")) {
					 $("#map_canvass").removeClass("span6");
					 $("#map_canvass").addClass("span12");
                                        lastCenter=map.getCenter(); 
                                        google.maps.event.trigger(map_canvas, 'resize');
                                        map.setCenter(lastCenter);
					 }
				});
			});
                       
		</script>


	
<script type="text/javascript">
  $(document).ready(function() {
    $('.multiselect1').multiselect({
      
    });
  });


</script>



	
  </head>

<body onload="initialize()">

<nav class = "navbar navbar-inverse navbar-fixed-top" role = "navigation">
	<div class = "container">
		<div class = "navbar-header">
			<a class="navbar-brand" href="<?php echo base_url();?>">ICDRRIS</a>
		</div>
		<ul class = "nav navbar-nav">
			<li class = "active"><a href = "<?php echo base_url();?>"><span class = "glyphicon glyphicon-home"></span> Home</a></li>
		</ul>
		
		<ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class = "glyphicon glyphicon-tint"></span> Incidents <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"><span class = "glyphicon glyphicon-bullhorn"></span> Report New...</a></li>
            <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-submenu">
                        <a tabindex="-1" href = "#"><span class = "glyphicon glyphicon-bullhorn"></span> Report New... </a>
                            <ul class="dropdown-menu">
                                <li> <a href="<?php echo base_url();?>Incident/reportIncident"><span class = "glyphicon glyphicon-bell"></span> Report New Incident </a></li>
                                <li> <a href="<?php echo base_url();?>Victim/reportVictim"><span class = "glyphicon glyphicon-pencil"></span> Report New Victim </a></li>
                            </ul>
                            <li><a href = "#"><i class = "icon-briefcase"></i> List of Incidents</a></li>
					</li>
				</ul>
			<li><a href = "#"><span class = "glyphicon glyphicon-briefcase"></span> List of Incidents</a></li>	
          </ul>
        </li>
      </ul>	

      <ul class="nav navbar-nav">
            <li class="dropdown" name="livelihoodDropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class = "glyphicon glyphicon-flag"></span> Livelihood Matching
                    <b class="caret"></b>
                </a>
            <ul class="dropdown-menu" role="menu">
				<li> 
						<a href = "http://localhost/icdrris/Livelihood/registerLivelihoodOrg" ><span class = "glyphicon glyphicon-edit"></span> Register Livelihood Org </a>
				</li>
                <li>
                    <a href = "#" ><span class = "glyphicon glyphicon-briefcase"></span> Register External Org</a>
                </li>
                <li>
                    <a href = "#"><span class = "glyphicon glyphicon-share"></span> Deploy Livelihood Org</a>
                </li>
                <li>
                    <a href = "#"><span class = "glyphicon glyphicon-search"></span> Search Livelihood Org</a>
                </li>
                <li>
                    <a href = "http://localhost/icdrris/Livelihood/viewAllLivelihoodOrgs" ><span class = "glyphicon glyphicon-search"></span> View All Livelihood Orgs</a>
                </li>
            </ul>


    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href = "#" data-target = "#myModal" data-toggle = "modal">Sign in</a></li>
       	
      </ul>
	</div>
</nav>

<script type = "text/javascript">
	$('#myModal').modal(options)
</script>

<div class="modal fade" id = "myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Sign in</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
 			<div class="form-group">
    			<label for="username" class="col-sm-4 control-label">Username</label>
    			<div class="col-sm-8">
      				<input type="email" class="form-control" id="Username">
    			</div>
  			</div>
  <div class="form-group">
    <label for="password" class="col-sm-4 control-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="password">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-success">Sign in</button>
    </div>
  </div>
</form>
      </div>
      <div class="modal-footer">
        Haven't registered yet? <a href = "<?php echo base_url();?>signup">Sign up now!</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->