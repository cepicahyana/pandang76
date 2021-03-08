<head>
    <script src="<?php echo base_url();?>assets/keycloak/keycloak.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/jquery/jquery-3.5.1.min.js" ></script>

    <script type="text/javascript">
      var keycloak = Keycloak('<?php echo base_url();?>assets/keycloak/keycloak.json');

        keycloak.init({onLoad: 'login-required',
                        responseMode: 'fragment', 
                        flow: 'standard', 
                        pkceMethod: 'S256'}).success(function (authenticated) {
        if (authenticated) {
    			$.ajax({
    				type: 'POST',
    				url: '<?php echo base_url();?>auth/token',
    				data: {refresh_token: keycloak.refreshToken},
    				success: function(data) { 
              if(data.status == 'true'){
                location.replace("<?php echo base_url();?>login");
              } else {
                alert('Something Went Wrong');
                keycloak.logout();
              }
    				}
    			});
        } 
      }).error(function () {
        alert('failed to initialize');
      });
    </script>
</head>
