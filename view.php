<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<title>Game</title>
</head>
<body>
<div class="container">
	<!-- TODO: add a form for the user to play the game -->
    <?php if ($showResult): ?>
        <div class="alert <?= $alertRole ?>" role="alert">
            <h4 class="alert-heading"><?= $result ?></h4>
        </div>
    <?php endif; ?>
    <h1>Language Quiz</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
        <fieldset>
            <legend>Write down the correct translation</legend>
            <h2><?= $_SESSION['wordToTranslate'] ?? ''; ?></h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="translation" id="translation" class="form-control" value="<?= $_GET['translation'] ?? ''; ?>" />
                </div>
            </div>
        </fieldset>
        <button type="submit" name="verify" class="btn btn-primary">Verify</button>
        <button type="submit" name="giveAnotherWord" class="btn btn-primary">Give Another Word</button>
        <button type="submit" name="newGame" class="btn btn-primary">New Game</button>
    </form>
</div>
</body>
</html>
