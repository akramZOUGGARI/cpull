<?php
  $output = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
  $output .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
  $output .= '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
  $output .= '<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">';
echo $output;
global $wpdb;
$table = $wpdb->prefix . 'cquiz';
$allquizsql = $wpdb->prepare( " SELECT * 
                 FROM  $table 
                ",null);
$allquiz = $wpdb->get_results($allquizsql);
 
 ?>
             <h2>Last</h2> 
             <div class="container">            
			    <?php foreach( $allquiz as $quiz ) { ?> 
			    <div class="row">
			    	<div class="col-md-7 offset-md-7">
				    <div  class="alert alert-warning"   role="alert">
				        <h4 class="alert-heading"><a href="#" class="alert-link"><?php echo $quiz->title;?></a></h4>
				        
				        <p><?php echo $quiz->content;?></p>
				   
				    </div>
				    </div>
				    <div class="col-md-4 offset-md-4">
				    	<div  class="alert alert-info"   role="alert">
				    	<?php for ($i=0; $i < $quiz->overall; $i++) echo '<i class="fa fa-star" aria-hidden="true"></i>';
				    	      for ($i=0; $i < 5-$quiz->overall; $i++) echo '<i class="fa fa-star-o" aria-hidden="true"></i>';?>  
				    	
				    	</div>
				    </div>
			    </div>
                <hr>
			    <?php }?>  
			</div>
 	
 
<?php 