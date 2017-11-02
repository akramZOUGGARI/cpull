
<?php 
  $output = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
  $output .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
  $output .= '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
echo $output;
  $new_quiz_form='  <div class="col-sm-3">
                      <h2>New Quiz</h2>
                      <form name="quiz_details" method="POST" action="">
						<label>Title  :</label> <input type="text" id="title" name="title" class="form-control" required/><br />
						<label>Content: </label><textarea  class="form-control" rows="5" id="content" name="content">Discription ...</textarea><br />					
						<label>Catagory:</label>
						<select  id="category" name="category" class="form-control">
							  <option value="1">Volvo</option>
							  <option value="2">Saab</option>
							  <option value="3">Mercedes</option>
							  <option value="4">Audi</option>
						</select> 
						<input type="submit" value="Submit" name="submit_form" class="btn btn-default"/>
					</form>
					</div>
					';
 echo  $new_quiz_form;
 global $wpdb;

  if ( isset( $_POST["submit_form"] )) {
        $table = $wpdb->prefix."cquiz";         
        $title  = $_POST["title"];
        $content  = $_POST["content"];
        $id_category = $_POST["category"];
        $wpdb->insert( 
            $table, 
            array( 
                'title' => $title,
                'content' => $content, 
                'id_category' => $id_category,                 
            ),
            array( 
		        '%s', 		 
	        ) 
        );
       
        
        $html = "<p>Your Quiz <strong>$name</strong> was successfully recorded. Thanks!!</p>";  
        echo $html;
   }






