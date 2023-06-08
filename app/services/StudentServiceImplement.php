<?php
require_once __DIR__ . "/StudentService.php";
class StudentServiceImplement implements StudentService
{
    public function createService(entities\StudentEntity $studentEntity): array
    {
        $studentRepository = new StudentRepositoryImplement();
        return $studentRepository->createRepository($studentEntity);
    }
    public function updateOneByIdService(entities\StudentEntity $studentEntity): array
    {
        $studentRepository = new StudentRepositoryImplement();
        return $studentRepository->updateOneByIdRepository($studentEntity);
    }
    public function updateByNameService(entities\StudentEntity $studentEntity, string $names): array
    {
        $studentRepository = new StudentRepositoryImplement();
        return $studentRepository->updateByNameRepository($studentEntity, $names);
    }
    public function findAllService(): array
    {
        $studentRepository = new StudentRepositoryImplement();
        return $studentRepository->findAllRepository();
    }

    public function findOneByIdService(entities\StudentEntity $studentEntity): array
    {
        $studentRepository = new StudentRepositoryImplement();
        return $studentRepository->findOneByIdRepository($studentEntity);
    }
    public function findByNameService(entities\StudentEntity $studentEntity): array
    {
        $studentRepository = new StudentRepositoryImplement();
        return $studentRepository->findByNameRepository($studentEntity);
    }
    public function deleteOneByIdService(entities\StudentEntity $studentEntity): array
    {
        $studentRepository = new StudentRepositoryImplement();
        return $studentRepository->deleteOneByIdRepository($studentEntity);
    }
    public function deleteByNameService(entities\StudentEntity $studentEntity): array
    {
        $studentRepository = new StudentRepositoryImplement();
        return $studentRepository->deleteByNameRepository($studentEntity);
    }
}
