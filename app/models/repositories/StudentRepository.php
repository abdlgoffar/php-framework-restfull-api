<?php
require_once __DIR__ . "/../entities/StudentEntity.php";
require_once __DIR__ . "/../data/Database.php";
require_once __DIR__ . "/../../utils/Response.php";
require_once __DIR__ . "/../../utils/Validation.php";
interface StudentRepository
{
    public function createRepository(entities\StudentEntity $studentEntity): array;
    public function updateOneByIdRepository(entities\StudentEntity $studentEntity): array;
    public function updateByNameRepository(entities\StudentEntity $studentEntity, string $names): array;
    public function findAllRepository(): array;
    public function findOneByIdRepository(entities\StudentEntity $studentEntity): array;
    public function findByNameRepository(entities\StudentEntity $studentEntity): array;
    public function deleteOneByIdRepository(entities\StudentEntity $studentEntity): array;
    public function deleteByNameRepository(entities\StudentEntity $studentEntity): array;
}
