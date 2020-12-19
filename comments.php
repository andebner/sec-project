<?php
	
	require "header.php";

?>					   

<main class="container pt-5 pb-5" style="text-align: center;">

	<div class="pb-2" style="font-weight: bold;">Comments</div>

	<?php 

		require 'includes/dbconnection.php';

		if (isset($_GET['mid'])) {

			$mid = $_GET['mid'];

		} else {

			$mid = $_POST["mid"];

		}

		$sql = "SELECT * FROM messages WHERE mid = '$mid'";

		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {

			header("Location: ../main.php?cmt=loaderror");
			exit();

		} else {

			mysqli_stmt_execute($stmt);

			$result = mysqli_stmt_get_result($stmt);

			if (mysqli_num_rows($result) > 0) {

				$row = mysqli_fetch_assoc($result);

			  	if ($row["user"] == $_SESSION['uName']) {	

					$bgr = "bubblethistle.png";
					$clr = "indigo";
					$trsl = "transform: scaleX(-1);";
					$cmtclr = "indigo";
				  
			  	} else {

			  		$bgr = "bubbleblued.png";
			  		$clr = "steelblue";
					$trsl = "";
					$cmtclr = "indigo";

			  	}

				    echo ' 

				    	<div  class="row pt-2">

					    	<div class="col-sm-12">

					    		<div style="background-image: url('.$bgr.'); min-height: 100px; height: 150%; min-width: 500px; background-position: center; background-repeat: no-repeat; background-size: 100% 100%;'.$trsl.'">

					    			<div style="display: flex; flex-direction: column; height: 100%; width: 100%; justify-content: center; font-weight: bold;'.$trsl.'">'.$row["message"].' <div style="color: '.$clr.';">@'.$row["user"].'</div></div>
						    			
					    		</div>
						    		
					    	</div>

					    </div>

				    ';

				} else {

					header("Location: ../main.php?cmt1=loaderror");
					exit();

				}

			}    //end message display

			$sql = "SELECT * FROM comments WHERE mid = '$mid'";

			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) {

				header("Location: ../main.php?cmt=loaderror");
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

					    		<div  class="row pt-4">

						    		<div class="col-sm-12">

						    			<div style="background-image: url('.$bgr.'); min-height: 80px; height: 150%; min-width: 250px; background-position: center; background-repeat: no-repeat; background-size: 80% 80%; '.$trsl.'">

						    				<div style="display: flex; flex-direction: column; height: 100%; width: 100%; justify-content: center; '.$trsl.'">'.$row["comment"].' <div style="color: '.$clr.';">@'.$row["user"].'</div></div>
							    			
						    			</div>
							    		
							    	</div>

							    </div>

						    ';

						}

					} else {

						echo '

							<div class="row pt-5" style="justify-content: center;">Be the first to comment!</div>

						';

					}

				}

				    //end comment display

	?>

	<div class="row pt-5" style="justify-content: center;">

		<a style="z-index: 1">Write a comment:</a>

	</div>

	<div class="row pt-3 pb-5" style="justify-content: center;">

	  	<form action="includes/comment.inc.php" method="post">

	  		<?php echo '

	   		<label for="cmttext" style="color: indigo">@ '.$_SESSION["uName"].'</label>

			<textarea rows="3" name="cmttext" class="form-control"></textarea>

			<input name="mid" type="text" value="'.$mid.'" hidden></input>
			
			<div class="pt-4 pb-3">
	
				<button type="submit" name="send-comment" class="btn btn-info" >Send</button>
	
			</div>

			'; ?>

    	</form>

	</div>
	
	<div class="pb-2 text-center">
		<button class="btn btn-outline-secondary py-1" onclick="document.location = 'main.php'">Back</button>
	</div>

</main>

<?php

	require "footer.php";

?>