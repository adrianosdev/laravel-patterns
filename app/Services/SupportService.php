<?php

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass;

class SupportService {

    protected $repository;
    public function __construct() {

    }

    public function getAll(string $filter = null): array {

        return $this->repository->getAll($filter);

    }

    public function findOne(string|int $id): stdClass|null {

        return $this->repository->findOne($id);

    }

    public function store(CreateSupportDTO $dto): stdClass {

       return $this->repository->store($dto);

    }

    public function update(UpdateSupportDTO $dto): stdClass|null {

        return $this->repository->update($dto);

    }

    public function destroy(string|int $id): void {

        $this->repository->destroy($id);

    }
}


