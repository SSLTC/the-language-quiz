<?php

class LanguageGame
{
    private array $words;
    private Word $word;

    public function __construct()
    {
        // :: is used for static functions
        // They can be called without an instance of that class being created
        // and are used mostly for more *static* types of data (a fixed set of translations in this case)
        if (isset($_SESSION['wordsToTranslate']) && 
            !isset($_GET['newGame'])) {
            $this->words = unserialize($_SESSION['wordsToTranslate']);
            //$this->word = unserialize($_SESSION['wordToTranslate']);
            foreach ($this->words as $word) {
                if ($_SESSION['wordToTranslate'] === $word->getWordToTranslate()) {
                    $this->word = $word;
                    return;
                }
            }            
        } else {
            foreach (Data::words() as $frenchTranslation => $englishTranslation) {
                // TODO: create instances of the Word class to be added to the words array
                $word = new Word($frenchTranslation, $englishTranslation);
                $this->words[] = $word;
            }
            $_SESSION['wordsToTranslate'] = serialize($this->words);
        }
    }

    public function run(): void
    {
        // TODO: check for option A or B

        // Option B: user has just submitted an answer
        // TODO: verify the answer (use the verify function in the word class) - you'll need to get the used word from the array first
        // TODO: generate a message for the user that can be shown
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['verify'])) {
                if ($this->word->verify($_GET['translation'])) 
                {
                    $GLOBALS['result'] = 'Correct!';                 
                    $GLOBALS['alertRole'] = "alert-success";
                    $GLOBALS['showResult'] = true;

                    $_GET['translation'] = '';

                    if (count($this->words) === 1) {
                        $GLOBALS['result'] .= '<br>You managed to translate all the words!';
                        unset($_SESSION['wordsToTranslate']);
                        return;
                    }

                    $wordIndex = array_search($this->word, $this->words);
                    array_splice($this->words, $wordIndex, 1);

                    $_SESSION['wordsToTranslate'] = serialize($this->words);
                } else {
                    $GLOBALS['result'] = 'Wrong!';
                    $GLOBALS['alertRole'] = "alert-danger";
                    $GLOBALS['showResult'] = true;
                    return;
                }
            }

            if (isset($_GET['giveAnotherWord'])) {
                $_GET['translation'] = '';
            }
        }

        // Option A: user visits site first time (or wants a new word)
        // TODO: select a random word for the user to translate
        $randomIndex = rand(0, count($this->words) -1);
        $randomWord = $this->words[$randomIndex];
        $this->word = $randomWord;
        $_SESSION['wordToTranslate'] = $randomWord->getWordToTranslate();
        //$_SESSION['wordToTranslate'] = serialize($randomWord);
    }
}