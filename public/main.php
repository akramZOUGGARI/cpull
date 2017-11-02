<?php
  $output = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">';
  $output .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
  $output .= '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
  $output .= '<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">';
//echo $output;
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
					        <h4 class="alert-heading"><a href="#" class="alert-link"><?php echo $quiz->title;?></a></h4>   <p><?php echo $quiz->content;?></p>					   
					    </div>
					    </div>
					    </div>

					    <div class="row">
				        <div class="col-md-7 offset-md-7">
				    	<div  class="alert alert-success"   role="alert">
				    	Note :
				    	<?php  echo $quiz->overall."/5 ";
				    	      for ($i=0; $i < $quiz->overall; $i++) echo '<i class="fa fa-star" aria-hidden="true"></i> ';
				    	      for ($i=0; $i < 5-$quiz->overall; $i++) echo '<i class="fa fa-star-o" aria-hidden="true"></i> ';?>  
				    	<button type="button" class="btn btn-primary">
						  Vote <span class="badge badge-light">9</span>
						</button>
				    	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">How many stars is your car worth? </button>
				    	<button type="button" class="btn btn-warning">Write your review</button>
				    	
				    	</div>
				        </div>
				        </div>				    
			    
			    <?php }?>  
			</div>	

			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  				<div class="modal-dialog" >
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">How many stars is your car worth?.</h4>
			        </div>
			        <div class="modal-body" id="comfort">			          
			          
			          <select class="selectpicker">
			          	 
			          	  <option selected="selected" hidden > Comfort :</option>
						  <option>5</option>
						  <option>4</option>
						  <option>3</option>
						  <option>2</option>
						  <option>1</option>						
					  </select>
					  
			          <select class="selectpicker" id="performance" >
			              <option selected="selected" hidden > Performance :</option>
						  <option>5</option>
						  <option>4</option>
						  <option>3</option>
						  <option>2</option>
						  <option>1</option>
					  </select>
					 
			          <select class="selectpicker" id="Interior_design">
			          	  <option selected="selected" hidden > Interior design :</option>
						  <option>5</option>
						  <option>4</option>
						  <option>3</option>
						  <option>2</option>
						  <option>1</option>
					  </select>

			          <select class="selectpicker" id="Exterior_styling">
			          	<option selected="selected" hidden > Exterior styling :</option>
						  <option>5</option>
						  <option>4</option>
						  <option>3</option>
						  <option>2</option>
						  <option>1</option>
					  </select>
					 <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">

			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>

 
<?php 