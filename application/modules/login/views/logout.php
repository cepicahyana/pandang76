<head>
    <script src="<?php echo base_url()?>assets/keycloak/keycloak.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/jquery/jquery-3.5.1.min.js" ></script>

    <script type="text/javascript">
		$(document).ready(function(){
  			var keycloak = Keycloak('<?php echo base_url()?>assets/keycloak/keycloak.json');

			keycloak.init().success(function (authenticated) 
			{
				keycloak.logout();
			}).error(function () {
				alert('failed to initialize');
			});
		});
		
    </script>
    <script type="text/javascript">
    </script>

</head>