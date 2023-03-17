<?php

class Word
{
    // TODO: add word (FR) and answer (EN) - (via constructor or not? why?)
    private string $wordToTranslate;
    private string $translation;

    public function getWordToTranslate(): string 
    {
        return $this->wordToTranslate;
    }

    public function __construct(string $wordToTranslate, string $translation)
    {
        $this->wordToTranslate = $wordToTranslate;
        $this->translation = $translation;
    }

    public function verify(string $answer): bool
    {
        // TODO: use this function to verify if the provided answer by the user matches the correct one
        // Bonus: allow answers with different casing (example: both bread or Bread can be correct answers, even though technically it's a different string)
        // Bonus (hard): can you allow answers with small typo's (max one character different)?
    }
}
