<?php

namespace App\Domain\DTO\Account;
use App\Domain\DTO\AbstractDTO;
use Symfony\Component\Validator\Constraints as Assert;


class CreateUpdateAccountInputDTO extends AbstractDTO
{
    public function __construct(
        #[Assert\NotBlank(['message' => 'O campo name é obrigatório.'])]
        public ?string $name,
        #[Assert\NotBlank(['message' => 'O campo balance é obrigatório.'])]
        public ?float $balance
    ){}
}