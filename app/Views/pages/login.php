<?php
$session = session();
$errors = $session->getFlashdata('errors') ?? [];
$old = $session->getFlashdata('old_input') ?? [];
$success = $session->getFlashdata('success');

helper('form');
?>

<h1>Login</h1>

<?php if (!empty($success)) : ?>
	<p><?= esc($success) ?></p>
<?php endif; ?>

<?php if (!empty($errors)) : ?>
	<div>
		<p>Erreurs :</p>
		<ul>
			<?php foreach ($errors as $error) : ?>
				<li><?= esc($error) ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>

<div>
	<h2>Connexion</h2>
	<form action="<?= site_url('traitement-login') ?>" method="post" onsubmit="return validateLogin(this);">
		<?= csrf_field() ?>
		<input type="hidden" name="form_type" value="login">

		<div>
			<label for="login_email">Email</label><br>
			<input id="login_email" type="email" name="Email" value="<?= esc($old['Email'] ?? '') ?>" required>
		</div>

		<div>
			<label for="login_password">Mot de passe</label><br>
			<input id="login_password" type="password" name="MotDePasse" required autocomplete="off">
		</div>

		<button type="submit">Se connecter</button>
	</form>
</div>

<div>
	<h2>Inscription</h2>
	<form action="<?= site_url('traitement-login') ?>" method="post" onsubmit="return validateRegister(this);">
		<?= csrf_field() ?>
		<input type="hidden" name="form_type" value="inscription">

		<div>
			<label for="register_nom">Nom</label><br>
			<input id="register_nom" type="text" name="Nom" value="<?= esc($old['Nom'] ?? '') ?>" required>
		</div>

		<div>
			<label for="register_prenom">Prenom</label><br>
			<input id="register_prenom" type="text" name="Prenom" value="<?= esc($old['Prenom'] ?? '') ?>" required>
		</div>

		<div>
			<label for="register_email">Email</label><br>
			<input id="register_email" type="email" name="Email" value="<?= esc($old['Email'] ?? '') ?>" required>
		</div>

		<div>
			<label for="register_password">MotDePasse</label><br>
			<input id="register_password" type="password" name="MotDePasse" required autocomplete="off">
		</div>

		<div>
			<label for="register_genre">idGenre</label><br>
			<input id="register_genre" type="text" name="idGenre" value="<?= esc($old['idGenre'] ?? '') ?>" required>
		</div>

		<button type="submit">S'inscrire</button>
	</form>
</div>

<script>
function isValidEmail(email) {
	return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function validateLogin(form) {
	const email = form.Email.value.trim();
	const password = form.MotDePasse.value;

	if (!isValidEmail(email)) {
		alert('Email invalide');
		return false;
	}

	if (password.length < 4) {
		alert('Mot de passe trop court');
		return false;
	}

	return true;
}

function validateRegister(form) {
	const nom = form.Nom.value.trim();
	const prenom = form.Prenom.value.trim();
	const email = form.Email.value.trim();
	const password = form.MotDePasse.value;
	const idGenre = form.idGenre.value.trim();

	if (nom.length < 2) {
		alert('Nom trop court');
		return false;
	}

	if (prenom.length < 2) {
		alert('Prenom trop court');
		return false;
	}

	if (!isValidEmail(email)) {
		alert('Email invalide');
		return false;
	}

	if (password.length < 4) {
		alert('Mot de passe trop court');
		return false;
	}

	if (idGenre.length < 1) {
		alert('idGenre obligatoire');
		return false;
	}

	return true;
}
</script>