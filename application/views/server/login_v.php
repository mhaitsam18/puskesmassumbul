<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login Admin Panel</title>
<link href="<?php echo base_url(); ?>assets/server/login/css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="keywords" content=""./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
</head>
<body>

<!--/start-login-one-->
	<div class="login">	
		<div>
			<center>
				<?php if ($this->session->flashdata('error')): ?>
    			<div class="alert alert-danger alert-dismissible">
	                <h4><b> Peringatan !</b></h4>
        			<?php echo $this->session->flashdata('error'); ?>
    			</div>
				<?php endif; ?>
        
				<?php if (validation_errors()): ?>
    			<div class="alert alert-danger alert-dismissible">
        			<?php echo validation_errors(); ?>
    			</div>
				<?php endif; ?>
			</center>
		</div>
		<div class="ribbon-wrapper h2 ribbon-red">
			<div class="ribbon-front">
				<h2>User Login</h2>
			</div>
			<div class="ribbon-edge-topleft2"></div>
			<div class="ribbon-edge-bottomleft"></div>
		</div>
		<form action="<?php echo base_url('server/login/in'); ?>" method="POST">
			<ul>
				<li>
					<input type="text" class="text" name="username" placeholder="Username" required>
				</li>
				 <li>
					<input type="password" name="password" placeholder="Password" required>
				</li>
				<li style="border:none">
					<p>
						<span id="captcha-img"><?php echo $image; ?></span>
						<a href="javascript:void(0)" onclick="refresh_captcha()">
	                    	refresh
	                    </a>
					</p>

					
				</li>
				<li>
					<input type="text" class="text" name="captcha" id="captcha">
				</li>
			</ul>
			
			<div class="submit">
				<input type="submit" value="Log in" >
			</div>
		</form>
	</div>
</body>
</html>



<script type="text/javascript">
function refresh_captcha(){
	$.ajax({
         url:'<?php echo base_url(); ?>server/login/refresh_captcha',
         dataType: "text",  
         cache:false,
         success:function(data){
            $('#captcha-img').html(data);
         }
    }); 
}
</script>


<script src="<?php echo base_url() ?>assets/server/assets/js/jquery.min.js"></script>
