<?php
	include 'page-includes/subjects.php';
	include 'page-includes/countries.php';
	include 'page-includes/functions.php';

	$firstname = $_POST['firstname'] ?? null;
	$lastname = $_POST['lastname'] ?? null;
	$gender = $_POST['gender'] ?? null;
	$email = $_POST['email'] ?? null;
	$country = $_POST['country'] ?? null;
	$subject = $_POST['firstname'] ?? '0';
	$message = $_POST['message'] ?? null;

	$subject = subject_validation($subject) ? $subject : '0';

	// var_log($_POST);
	// var_log($subject);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Hackers Poulette</title>
	<!-- bootstrap css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- main css -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
</head>
<body class="p-3">
	<svg id="definition" version="1.1" xmlns="http://www.w3.org/2000/svg">
	<defs>
		<symbol id="required" viewbox="0 0 128 128"><g><path d="M110.1,16.4L75.8,56.8l0.3,1l50.6-10.2v32.2l-50.9-8.9l-0.3,1l34.7,39.1l-28.3,16.5L63.7,78.2L63,78.5   l-18.5,49L17.2,111l34.1-39.8v-0.6l-50,9.2V47.6l49.3,9.9l0.3-0.6L17.2,16.7L45.5,0.5l17.8,48.7H64L82.1,0.5L110.1,16.4z"></path></g></symbol>
	</defs>
	</svg>

	<main class="container p-4 p-md-5">
		<figure class="d-flex justify-content-center mb-5">
			<img src="https://zupimages.net/up/19/41/iekp.png" alt="logo">
		</figure>
		<form action="" method="post" class="needs-validation" novalidate>
			<div class="form-row">

				<div class="col-md-6 col-12 mb-3">
					<!-- firstname start -->
					<label for="firstname">First name
						<svg class="icon" focusable="false"><use xlink:href="#required"></use></svg><div class="visually-hidden">required</div>
					</label>
					<input type="text" class="form-control <?= !empty($firstname) ? add_invalid_class(text_validation($firstname)) : '' ?>" id="firstname" name="firstname" placeholder="Jhon" value="<?=$firstname ?? ''?>" required>

					<div class="invalid-feedback">Please entre your first name.</div>
					<div class="valid-feedback">Looks good!</div>
					<!-- end -->
				</div>

				<div class="col-md-6 col-12 mb-3">
					<!-- lastname start -->
					<label for="lastname">Last name
						<svg class="icon" focusable="false"><use xlink:href="#required"></use></svg><div class="visually-hidden">required</div>
					</label>
					<input type="text" class="form-control <?= !empty($lastname) ? add_invalid_class(text_validation($lastname)) : '' ?>" id="lastname" name="lastname" value="<?=$lastname ?? ''?>" placeholder="Doe" required>

					<div class="invalid-feedback">Please entre your last name.</div>
					<div class="valid-feedback">Looks good!</div>
					<!-- end -->
				</div>

				<div class="col-md-3 col-12 d-flex justify-content-center justify-content-md-end flex-column">
					<!-- gender start -->
					<span>Gender
						<svg class="icon" focusable="false"><use xlink:href="#required"></use></svg><div class="visually-hidden">required</div>
					</span>
					<?php
						$gender_validat_class = !empty($gender) ? add_invalid_class(gender_validation($gender)) : '';
					?>
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input <?= $gender_validat_class ?>" id="female" name="gender" value="f" <?= $gender == 'f' ? 'checked' : '' ?> required>
						<label class="custom-control-label" for="female">F</label>
					</div>
					<div class="custom-control custom-radio mb-3">
						<input type="radio" class="custom-control-input <?= $gender_validat_class ?>" id="male" name="gender" value="m" <?= $gender == 'm' ? 'checked' : '' ?> required>
						<label class="custom-control-label" for="male">M</label>

						<div class="invalid-feedback">Please select your gender.</div>
						<div class="valid-feedback">Looks good!</div>
					</div>
					<!-- end -->
				</div>

				<div class="col-md-5 col-12 mb-3">
					<!-- email start -->
					<label for="email">Email
						<svg class="icon" focusable="false"><use xlink:href="#required"></use></svg><div class="visually-hidden">required</div>
					</label>
					<input type="text" class="form-control <?= !empty($email) ? add_invalid_class(email_validation($email)) : '' ?>" id="email" name="email" placeholder="entre your email" value="<?=$email ?? ''?>" required>

					<div class="invalid-feedback">Please entre your email address.</div>
					<div class="valid-feedback">Looks good!</div>
					<!-- end -->
				</div>

				<div class="col-md-4 col-6 form-group">
					<!-- country start -->
					<label for="country">Country
						<svg class="icon" focusable="false"><use xlink:href="#required"></use></svg><div class="visually-hidden">required</div>
					</label>
					<select id="country" name="country" class="custom-select <?= !empty($country) ? add_invalid_class(countries_validation($country)) : '' ?>" required>
						<option value="" <?=$_POST['gender'] ? '' : 'selected'?> disabled>Select your country</option>
						<?php foreach($countries as $iso => $country):?>
							<option value="<?=$iso?>" <?= isset($_POST['gender']) AND $_POST['gender'] == $iso ? 'selected' : '' ?> ><?=$country?></option>
						<?php endforeach; ?>
					</select>
					<div class="invalid-feedback">Please select a country.</div>
					<div class="valid-feedback">Looks good!</div>
					<!-- end -->
				</div>

				<div class="col-md-12 col-6 form-group">
					<!-- subject start -->
					<label for="subject">Subject</label>
					<select id="subject" class="custom-select">
						<option value="0" <?= empty($subject) ? 'selected' : '' ?> >Other</option>
						<?php foreach($subjects_option as $key => $option):?>
							<option value="<?=$key?>" <?= !empty($gender) AND $gender == $iso ? 'selected' : '' ?> ><?=$option?></option>
						<?php endforeach; ?>
					</select>
					<div class="valid-feedback">Looks good!</div>
					<!-- end -->
				</div>

				<div class="col-12 form-group ">
					<label for="message">Message
						<svg class="icon" focusable="false"><use xlink:href="#required"></use></svg><div class="visually-hidden">required</div>
					</label>
					<textarea class="form-control <?= !empty($message) ? add_invalid_class(true) : '' ?>" placeholder="Enter your message" id="message" name="message" rows="3" required><?=htmlentities($message)?></textarea>

					<div class="invalid-feedback">Please select a subject.</div>
					<div class="valid-feedback">Looks good!</div>
				</div>

				<p class="col-12" aria-hidden="true">
					<svg class="icon" focusable="false"><use xlink:href="#required"></use></svg>Required field
				</p>

			</div>

			<button class="btn btn-primary px-3" type="submit">Send from</button>
		</form>
	</main>

	<!-- js bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<!-- jquery validation plugin-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>

	<!-- main js -->
	<script>
		
		// css validation
		const forms = document.getElementsByClassName('needs-validation');

		const validation = Array.prototype.filter.call(forms, (form) => {

			form.addEventListener('submit', (event) => {

				if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add('was-validated');

			}, false);
		});

		// js validation
		$("form.needs-validation").validat({
			debug: false
		})

	</script>
</body>
</html>