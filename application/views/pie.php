<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script> 
	    submitForms = function(){
	      document.forms["form1"].submit();
	      document.forms["form2"].submit();
	    } 
    </script>
  </body>
</html>