<?php

$session = session();
$request = service('request');

if ($request->getMethod(true) !== 'POST') {
	return redirect()->to(base_url('/'));
}

$formType = (string) ($request->getPost('form_type') ?? 'login');
$errors = [];

$nom = trim((string) $request->getPost('Nom'));
$prenom = trim((string) $request->getPost('Prenom'));
$motDePasse = (string) $request->getPost('MotDePasse');
$email = trim((string) $request->getPost('Email'));
$idGenre = trim((string) $request->getPost('idGenre'));

if ($formType === 'inscription') {
	if (strlen($nom) < 2) {
		$errors[] = 'Le nom doit contenir au moins 2 caractères.';
	}

	if (strlen($prenom) < 2) {
		$errors[] = 'Le prénom doit contenir au moins 2 caractères.';
	}

	if (strlen($motDePasse) < 4) {
		$errors[] = 'Le mot de passe doit contenir au moins 4 caractères.';
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = 'L\'email est invalide.';
	}

	if ($idGenre === '') {
		$errors[] = 'Le genre est obligatoire.';
	}
} else {
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = 'L\'email est invalide.';
	}

	if (strlen($motDePasse) < 4) {
		$errors[] = 'Le mot de passe doit contenir au moins 4 caractères.';
	}
}

if (!empty($errors)) {
	$session->setFlashdata('errors', $errors);
	$session->setFlashdata('old_input', [
		'Nom' => $nom,
		'Prenom' => $prenom,
		'MotDePasse' => $motDePasse,
		'Email' => $email,
		'idGenre' => $idGenre,
		'form_type' => $formType,
	]);

	return redirect()->back()->withInput();
}

$session->setFlashdata('success', 'Validation OK. Redirection vers le dashboard.');

return redirect()->to(base_url('dashboard'));
