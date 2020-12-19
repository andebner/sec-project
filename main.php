<?php
	
	require "header.php"

?>

<main class="pt-5 pb-5 container">

	<?php

		if (isset($_GET['send'])) {

			if ($_GET['send'] == "success") {
							
				echo '

					<div class="alert alert-success">Your message has been sent!</div>

				';

			} else if ($_GET['send'] == "error") {

				echo '

					<div class="alert alert-danger">There has been an errror sending your message. Please try again!</div>

				';

			} else if ($_GET['send'] == "loaderror") {

				echo '

					<div class="alert alert-danger">There has been an errror loading the messages. Please try again!</div>

				';

			}

		}

		if (isset($_GET['cmt'])) {

			if ($_GET['cmt'] == "success") {
							
				echo '

					<div class="alert alert-success">Your comment has been sent!</div>

				';

			} else if ($_GET['cmt'] == "error") {

				echo '

					<div class="alert alert-danger">There has been an errror sending your comment. Please try again!</div>

				';

			} 

		}

	?>
	<div>
		
		<button onclick="document.location = 'write.php'" class="btn" style="background-color: plum; border-color: purple; color: white">Write a new message!</button>

	</div>
	
	<div class="pt-5" style="text-align: center;">

		<?php
			
			require 'includes/dbconnection.php';

			$sql = "SELECT * FROM messages";

			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) {

				header("Location: ../main.php?send=loaderror");
				exit();

			} else {

				mysqli_stmt_execute($stmt);
				
				$result = mysqli_stmt_get_result($stmt);


				if (mysqli_num_rows($result) > 0) {
				
				  while($row = mysqli_fetch_assoc($result)) {

				  	if ($row["user"] == $_SESSION['uName']) {	

						$bgr = "bubbleviola.png";
						$clr = "indigo";
						$trsl = "transform: scaleX(-1);";
						$cmtclr = "indigo";
				  
				  	} else {

				  		$bgr = "bubbleblue.png";
				  		$clr = "steelblue";
						$trsl = "";
						$cmtclr = "indigo";

				  	}

					    echo ' 

					    	<div  class="row pt-2">

						    	<div class="col-sm-12">

						    		<div style="background-image: url('.$bgr.'); min-height: 100px; height: 150%; min-width: 500px; background-position: center; background-repeat: no-repeat; background-size: 100% 100%;'.$trsl.'">

						    			<div style="display: flex; flex-direction: column; height: 100%; width: 100%; justify-content: center; '.$trsl.'">'.$row["message"].' <div style="color: '.$clr.';">@'.$row["user"].'</div></div>
						    			
						    		</div>
						    		
						    	</div>

						    </div>

						    <div class="row pt-1" style="justify-content: center;">

						    	<a style="z-index: 1" id="cmtbtn" onclick="comment()">Comment</a>
						    </div>

						    <div class="row pb-2" style="justify-content: center;">

						    	<form id="cmtform" action="includes/comment.inc.php" method="post" hidden>

						    		<div name="msgId" hidden>'.$row["mid"].'</div>
				
									<label for="cmttext" style="color: '.$cmtclr.'">@'.$_SESSION["uName"].'</label>
									<textarea rows="3" name="cmttext" class="form-control"></textarea>
								
									<div class="pt-4 pb-3">
								   		<button type="submit" name="send-comment" class="btn btn-info" >Send</button>
								   	</div>

								</form>

						    </div>

						    <script>

								function comment() {

							    if(document.getElementById("cmtform").hidden == true) {

							 		  document.getElementById("cmtform").hidden = false;

							    } else {

							      document.getElementById("cmtform").hidden = true;

							    }
							    
							  }

							</script>

					    ';

				  	

				  }

				} else {

					header("Location: ../main.php?send=loaderror");
					exit();

				}

			}

		?>
		

	</div>

</main>


<?php

	require "footer.php"

?>