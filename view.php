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
    <h1>Language Quiz</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
    <fieldset>
            <legend>Write down the correct translation</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="wordToTranslate">Word to translate:</label>
                    <input type="text" name="wordToTranslate" id="wordToTranslate" class="form-control" value="<?= $_SESSION['wordToTranslate'] ?? ''; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="translation">Translation:</label>
                    <input type="text" name="translation" id="translation" class="form-control" value="<?= $_SESSION['translation'] ?? ''; ?>" />
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Verify</button>
        <button type="submit" name="giveAnotherWord" class="btn btn-primary">Give Another Word</button>
    </form>
</div>
</body>
</html>
