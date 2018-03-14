<html>

		<?php
		$bad_frequency=0;
		$medium_frequency=0;
		$good_frequency=0;
		foreach ($myVariable as &$myVariable1){
		if ($myVariable1 < 20) {
			$good_frequency = $good_frequency+1;
		} elseif ($myVariable1 > 60) {
			$bad_frequency = $bad_frequency+1;
		} else {
			$medium_frequency = $medium_frequency+1;
		}
		}
		?>

</html>