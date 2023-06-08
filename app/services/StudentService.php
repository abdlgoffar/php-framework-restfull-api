<?php
require_once __DIR__ . "/../models/repositories/StudentRepositoryImplement.php";
require_once __DIR__ . "/../models/entities/StudentEntity.php";
interface StudentService
{
    public function createService(entities\StudentEntity $studentEntity): array;
    public function updateOneByIdService(entities\StudentEntity $studentEntity): array;
    public function updateByNameService(entities\StudentEntity $studentEntity, string $names): array;
    public function findAllService(): array;
    public function findOneByIdService(entities\StudentEntity $studentEntity): array;
    public function findByNameService(entities\StudentEntity $studentEntity): array;
    public function deleteOneByIdService(entities\StudentEntity $studentEntity): array;
    public function deleteByNameService(entities\StudentEntity $studentEntity): array;
}
