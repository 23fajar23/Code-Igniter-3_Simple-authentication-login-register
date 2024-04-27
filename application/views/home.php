<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

	<form method="post" autocomplete="off" action="<?= base_url('authcontroller/register') ?>">
		Full Name
		<input type="text" id="name" name="name" required /></br>
		username
		<input type="text" id="username" name="username" required /></br>
		password
		<input type="text" id="password" name="password" required /></br>

		<label for="dog-names">Batch : </label>
		<label for="dog-names">Batch : </label>
		<select name="batch" id="batch">
			<?php foreach ($data as $row) : ?>
				<option value="<?= $row->id ?>"><?= $row->name ?></option>
			<?php endforeach; ?>
		</select>

		<button type="submit">Kirim</button>

		<?php if ($this->session->flashdata('success')) {?>
			<p class="text-success text-center" style="margin-top: 10px">
				<?=$this->session->flashdata('success') ?>
			</p>
		<?php }?>
	</form>




</body>

</html>
