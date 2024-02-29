<?php

namespace App\Domain\DTO;

use Symfony\Component\Validator\Validator\ValidatorInterface;

class DTOValidator
{
    private $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @throws \Exception
     */
    public function validate($dto):?array
    {
        $errors = $this->validator->validate($dto);

        if (count($errors)>0){
            $errorOutput = [
                'message' => 'The given data is invalid.',
                'errors' => []
            ];

            foreach ($errors as $error){
                $errorOutput['errors'][$error->getPropertyPath()] = [$error->getMessage()];
            }
        }

        return $errorOutput??null;
    }
}