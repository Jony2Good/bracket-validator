<?php

declare(strict_types=1);

namespace Emelyanenko\BracketValidator\Service;

use Emelyanenko\BracketValidator\Exceptions\EmptyStringException;
use Emelyanenko\BracketValidator\Exceptions\InvalidCountException;

class BracketValidatorService
{
    /**
     * @throws EmptyStringException
     * @throws InvalidCountException
     */
    public function validate(?string $input): bool
    {
        if ($input === null || trim($input) === '') {
            throw new EmptyStringException("Пустая строка");
        }

        $balance = 0;
        $length = strlen($input);

        for ($i = 0; $i < $length; $i++) {
            $char = $input[$i];
            if ($char === '(') {
                $balance++;
            } elseif ($char === ')') {
                $balance--;
            }

            if ($balance < 0) {
                throw new InvalidCountException("Не совпадает количество открытых и закрытых скобок");
            }
        }

        if ($balance !== 0) {
            throw new InvalidCountException("Ошибка в структуре запроса");
        }

        return true;
    }
}