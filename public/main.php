<?php
 $output = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
  $output .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
  $output .= '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
echo $output;
global $wpdb;
$table = $wpdb->prefix . 'cquiz';
$allquizsql = $wpdb->prepare( " SELECT * 
                 FROM  $table 
                ",null);
$allquiz = $wpdb->get_results($allquizsql);
 

 ?>
 <div class="col-md-8">
             <h2>All Quiz</h2>
             <table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Title</th>
			        <th>Content</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php foreach( $allquiz as $quiz ) { ?> 
			      <tr>
			        <td><?php echo $quiz->title;?></td>
			        <td><?php echo $quiz->content;?></td>
			        <td>
						<button type="button" class="btn btn-primary">Edit</button>
			        	<button type="button" class="btn btn-danger">Delete</button>
			        </td>
			      </tr>
			      <?php<?php }?>'
			    </tbody>
			  </table>
            </div>
 	
 
<?php 