<?php
	
	require "header.php"

?>

<main class="pt-5 container text-center">

	<div class="row">

		<div class="col-sm"></div>

		<div class="col-sm">

			<form action="includes/sendmessage.inc.php" method="post">
				
					<label for="msgtext" class="control-label">Enter your message!</label>
					<textarea rows="10" name="msgtext" class="form-control"></textarea>
				
				<div class="pt-4 pb-3">
			   		<button type="submit" class="btn btn-info" >Send</button>
			   	</div>

			</form>

			<div class="pb-2 text-center">
				<button class="btn btn-outline-secondary py-1" onclick="document.location = 'main.php'">Back</button>
			</div>

		</div>

		<div class="col-sm"></div>

	</div>

</main>


<?php

	require "footer.php"

?>