<?php
	
	require "header.php";

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

					<div class="alert alert-danger">There has been an error sending your message. Please try again!</div>

				';

			} else if ($_GET['send'] == "loaderror") {

				echo '

					<div class="alert alert-danger">There has been an error loading the messages. Please try again!</div>

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

					<div class="alert alert-danger">There has been an error sending your comment. Please try again!</div>

				';

			} else if ($_GET['cmt'] == "loaderror") {

				echo '

					<div class="alert alert-danger">There has been an error loading the comments. Please try again!</div>

				';

			}

		}

	?>
	<div>
		
		<button onclick="document.location = 'write.php'" class="btn" style="background-color: plum; border-color: purple; color: white">Write a new message!</button>

	</div>
	
	<div class="pt-5">

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

						$bgr = "bubblethistle.png";
						$clr = "indigo";
						$trsl = "transform: scaleX(-1);";
						$cmtclr = "indigo";
						$mgn = "margin-left: 5%; padding-right: 5%; padding-bottom: 5%; padding-top: 5%; align-items: center;";
				  
				  	} else {

				  		$bgr = "bubbleblued.png";
				  		$clr = "steelblue";
						$trsl = "";
						$cmtclr = "indigo";
						$mgn = "margin-right: 5%; margin-left: 25%;  padding-bottom: 5%; padding-top: 5%;";

				  	}

					    echo ' 

					    	<div  class="row pt-2">

						    	<div class="col-sm-12">

						    		<div style="background-image: url('.$bgr.'); min-height: 60px; height: 150%; min-width: 500px; background-position: center; background-repeat: no-repeat; background-size: 100% 100%;'.$trsl.'">

						    			<div style="display: flex; flex-direction: column; height: 100%;
						    			width: 70%; justify-content: center;  overflow: auto; '.$mgn.' '.$trsl.'">'.$row["message"].' <div style="padding-bottom: 5%; color: '.$clr.';">@'.$row["user"].'</div></div>
						    			
						    		</div>
						    		
						    	</div>

						    </div>

						    <form class="row" style="justify-content: center;" method="POST" action="comments.php">

						    	<input name="mid" type="text" value="'.$row["mid"].'" hidden></input>
						    	<button style="z-index: 1; color: dimgray;" type="submit" class="btn btn-link">Show Comments</button>

						    </form>

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

	require "footer.php";

?>