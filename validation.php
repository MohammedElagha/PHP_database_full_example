<?php
function validate_phone ($phone) {
	if (ctype_digit($phone)) {
		return true;
	} else {
		return false;
	}
}

function validate_email ($email) {
	$regex = '/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/';

	if (preg_match($regex, $email, $match)) {
		return true;
	} else {
		return false;
	}
}
?>