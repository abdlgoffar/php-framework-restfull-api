<?php
require_once __DIR__ . "/StudentRepository.php";
class StudentRepositoryImplement implements StudentRepository
{
    //create
    private array $createStudentMessages = [];
    public function createRepository(entities\StudentEntity $studentEntity): array
    {
        $createRequirement = true;
        $pdoCreateStudent = Database::start()->prepare("INSERT INTO student(name, email, address) VALUES(:name, :email, :address)");

        //empty validation
        if (Validation::checkEmpty([$studentEntity->getName()])) {
            $this->createStudentMessages[] = ["name field is required"];
            $createRequirement = false;
        }
        if (Validation::checkEmpty([$studentEntity->getEmail()])) {
            $this->createStudentMessages[] = ["email field is required"];
            $createRequirement = false;
        }
        if (Validation::checkEmpty([$studentEntity->getAddress()])) {
            $this->createStudentMessages[] = ["address field is required"];
            $createRequirement = false;
        }
        //char validation
        if (!Validation::checkEmpty([$studentEntity->getName()]) && Validation::checkStringChar($studentEntity->getName())) {
            $this->createStudentMessages[] = ["name field char is invalid, create only with letters or numbers"];
            $createRequirement = false;
        }
        if (!Validation::checkEmpty([$studentEntity->getEmail()]) && Validation::checkEmail($studentEntity->getEmail())) {
            $this->createStudentMessages[] = ["email field char is invalid"];
            $createRequirement = false;
        }
        if (!Validation::checkEmpty([$studentEntity->getAddress()]) && Validation::checkAddress($studentEntity->getAddress())) {
            $this->createStudentMessages[] = ["address field note is invalid/example valid: jl. example valid"];
            $createRequirement = false;
        }
        if (!Validation::checkEmpty([$studentEntity->getAddress()]) && Validation::checkStringChar($studentEntity->getAddress())) {
            $this->createStudentMessages[] = ["address field char is invalid", "create only with letters or numbers"];
            $createRequirement = false;
        }
        //lenght validation
        if (!Validation::checkEmpty([$studentEntity->getName()]) && Validation::checkStringLenght($studentEntity->getName(), 3, 18)) {
            $this->createStudentMessages[] = ["name field min char is 3, and max is 18"];
            $createRequirement = false;
        }
        if (!Validation::checkEmpty([$studentEntity->getEmail()]) && Validation::checkStringLenght($studentEntity->getEmail(), 5, 55)) {
            $this->createStudentMessages[] = ["email field min char is 5, and max is 55"];
            $createRequirement = false;
        }
        if (!Validation::checkEmpty([$studentEntity->getAddress()]) && Validation::checkStringLenght($studentEntity->getAddress(), 5, 155)) {
            $this->createStudentMessages[] = ["address field min char is 5, and max is 155"];
            $createRequirement = false;
        }
        if ($createRequirement === true) {
            $pdoCreateStudent->bindValue(":name", $studentEntity->getName(), PDO::PARAM_STR);
            $pdoCreateStudent->bindValue(":email", $studentEntity->getEmail(), PDO::PARAM_STR);
            $pdoCreateStudent->bindValue(":address", $studentEntity->getAddress(), PDO::PARAM_STR);
            $pdoCreateStudent->execute();
            if ($pdoCreateStudent->rowCount() === 1) {
                $pdoCreateStudent = null;
                $pdoCreateStudentResult = Database::start()->prepare("SELECT id, name, email, address FROM student WHERE name = :name AND email = :email AND address = :address");
                $pdoCreateStudentResult->bindValue(":name", $studentEntity->getName(), PDO::PARAM_STR);
                $pdoCreateStudentResult->bindValue(":email", $studentEntity->getEmail(), PDO::PARAM_STR);
                $pdoCreateStudentResult->bindValue(":address", $studentEntity->getAddress(), PDO::PARAM_STR);
                if ($pdoCreateStudentResult->execute() === true) {
                    return Response::jsonFiles(true, $pdoCreateStudentResult->fetch(PDO::FETCH_ASSOC), []);
                }
                $pdoCreateStudentResult = null;
            }
        }
        $pdoCreateStudent = null;
        return Response::jsonFiles(false, [], $this->createStudentMessages);
    }
    //update one by id
    private array $updateOneStudentByIdMessages = [];
    public function updateOneByIdRepository(entities\StudentEntity $studentEntity): array
    {
        $updateOneStudentByIdRequirement = true;
        $pdoUpdateOneStudentById = Database::start()->prepare("UPDATE student SET name = :name, email = :email, address = :address WHERE id = :id");
        //empty validation
        if (Validation::checkEmpty([$studentEntity->getId()])) {
            $this->updateOneStudentByIdMessages[] = ["id parameter is required"];
            $updateOneStudentByIdRequirement = false;
        }
        if (Validation::checkEmpty([$studentEntity->getName()])) {
            $this->updateOneStudentByIdMessages[] = ["name field is required"];
            $updateOneStudentByIdRequirement = false;
        }
        if (Validation::checkEmpty([$studentEntity->getEmail()])) {
            $this->updateOneStudentByIdMessages[] = ["email field is required"];
            $updateOneStudentByIdRequirement = false;
        }
        if (Validation::checkEmpty([$studentEntity->getAddress()])) {
            $this->updateOneStudentByIdMessages[] = ["address field is required"];
            $updateOneStudentByIdRequirement = false;
        }
        //char validation
        if (!Validation::checkEmpty([$studentEntity->getId()]) && Validation::checkIntegerChar($studentEntity->getId())) {
            $this->updateOneStudentByIdMessages[] = ["id is invalid"];
            $updateOneStudentByIdRequirement = false;
        }
        if (!Validation::checkEmpty([$studentEntity->getName()]) && Validation::checkStringChar($studentEntity->getName())) {
            $this->updateOneStudentByIdMessages[] = ["name field char is invalid, create only with letters or numbers"];
            $updateOneStudentByIdRequirement = false;
        }
        if (!Validation::checkEmpty([$studentEntity->getEmail()]) && Validation::checkEmail($studentEntity->getEmail())) {
            $this->updateOneStudentByIdMessages[] = ["email field is invalid"];
            $updateOneStudentByIdRequirement = false;
        }
        if (!Validation::checkEmpty([$studentEntity->getAddress()]) && Validation::checkAddress($studentEntity->getAddress())) {
            $this->updateOneStudentByIdMessages[] = ["address field note is invalid/example valid: jl. example valid"];
            $updateOneStudentByIdRequirement = false;
        }
        if (!Validation::checkEmpty([$studentEntity->getAddress()]) && Validation::checkStringChar($studentEntity->getAddress())) {
            $this->updateOneStudentByIdMessages[] = ["address field char is invalid, create only with letters or numbers"];
            $updateOneStudentByIdRequirement = false;
        }
        //lenght validation
        if (!Validation::checkEmpty([$studentEntity->getName()]) && Validation::checkStringLenght($studentEntity->getName(), 3, 18)) {
            $this->updateOneStudentByIdMessages[] = ["name field min char is 3, and max is 18"];
            $updateOneStudentByIdRequirement = false;
        }
        if (!Validation::checkEmpty([$studentEntity->getEmail()]) && Validation::checkStringLenght($studentEntity->getEmail(), 5, 55)) {
            $this->updateOneStudentByIdMessages[] = ["email field min char is 5, and max is 55"];
            $updateOneStudentByIdRequirement = false;
        }
        if (!Validation::checkEmpty([$studentEntity->getAddress()]) && Validation::checkStringLenght($studentEntity->getAddress(), 5, 155)) {
            $this->updateOneStudentByIdMessages[] = ["address field min char is 5, and max is 155"];
            $updateOneStudentByIdRequirement = false;
        }
        if ($updateOneStudentByIdRequirement === true) {
            $pdoUpdateOneStudentById->bindValue(":id", $studentEntity->getId(), PDO::PARAM_INT);
            $pdoUpdateOneStudentById->bindValue(":name", $studentEntity->getName(), PDO::PARAM_STR);
            $pdoUpdateOneStudentById->bindValue(":email", $studentEntity->getEmail(), PDO::PARAM_STR);
            $pdoUpdateOneStudentById->bindValue(":address", $studentEntity->getAddress(), PDO::PARAM_STR);
            $pdoUpdateOneStudentById->execute();
            if ($pdoUpdateOneStudentById->rowCount() === 1) {
                $pdoUpdateOneStudentById = null;
                $pdoUpdateOneStudentByIdResult = Database::start()->prepare("SELECT id, name, email, address FROM student WHERE id = :id AND name = :name AND email = :email AND address = :address");
                $pdoUpdateOneStudentByIdResult->bindValue(":id", $studentEntity->getId(), PDO::PARAM_INT);
                $pdoUpdateOneStudentByIdResult->bindValue(":name", $studentEntity->getName(), PDO::PARAM_STR);
                $pdoUpdateOneStudentByIdResult->bindValue(":email", $studentEntity->getEmail(), PDO::PARAM_STR);
                $pdoUpdateOneStudentByIdResult->bindValue(":address", $studentEntity->getAddress(), PDO::PARAM_STR);
                if ($pdoUpdateOneStudentByIdResult->execute() === true) {
                    return Response::jsonFiles(true, $pdoUpdateOneStudentByIdResult->fetch(PDO::FETCH_ASSOC), []);
                }
                $pdoUpdateOneStudentByIdResult = null;
            } elseif ($pdoUpdateOneStudentById->rowCount() === 0) {
                $this->updateOneStudentByIdMessages[] = ["you didn't update any data or maybe the data you want to update is not available"];
            }
        }
        $pdoUpdateOneStudentById = null;
        return Response::jsonFiles(false, [], $this->updateOneStudentByIdMessages);
    }
    //update by name
    private array $updateStudentByNameMessages = [];
    public function updateByNameRepository(entities\StudentEntity $studentEntity, string $names): array
    {
        $updateStudentByNameSpecialNameRequirement = true;
        $updateStudentByNameSpecialEmailRequirement = true;
        $updateStudentByNameSpecialAddressRequirement = true;
        if (!Validation::checkEmpty([$studentEntity->getName()])) /*name*/ {
            if (Validation::checkStringChar($studentEntity->getName())) {
                $this->updateStudentByNameMessages[] = ["name field char is invalid, create only with letters or numbers"];
                $updateStudentByNameSpecialNameRequirement = false;
            }
            if (Validation::checkStringLenght($studentEntity->getName(), 3, 18)) {
                $this->updateStudentByNameMessages[] = ["name field min char is 3, and max is 18"];
                $updateStudentByNameSpecialNameRequirement = false;
            }
            if ($updateStudentByNameSpecialNameRequirement === true) {
                $pdoUpdateStudentByNameSpecialName = Database::start()->prepare("UPDATE student SET name = ? WHERE name = ?");
                $pdoUpdateStudentByNameSpecialName->bindValue(1, $studentEntity->getName(), PDO::PARAM_STR);
                $pdoUpdateStudentByNameSpecialName->bindValue(2, $names, PDO::PARAM_STR);
            }
        }
        if (!Validation::checkEmpty([$studentEntity->getEmail()])) /*email*/ {
            if (Validation::checkEmail($studentEntity->getEmail())) {
                $this->updateStudentByNameMessages[] = ["email field is invalid"];
                $updateStudentByNameSpecialEmailRequirement = false;
            }
            if (Validation::checkStringLenght($studentEntity->getEmail(), 5, 55)) {
                $this->updateStudentByNameMessages[] = ["email field min char is 5, and max is 55"];
                $updateStudentByNameSpecialEmailRequirement = false;
            }
            if ($updateStudentByNameSpecialEmailRequirement === true) {
                $pdoUpdateStudentByNameSpecialEmail = Database::start()->prepare("UPDATE student SET email = ? WHERE name = ?");
                $pdoUpdateStudentByNameSpecialEmail->bindValue(1, $studentEntity->getEmail(), PDO::PARAM_STR);
                $pdoUpdateStudentByNameSpecialEmail->bindValue(2, $names, PDO::PARAM_STR);
            }
        }
        if (!Validation::checkEmpty([$studentEntity->getAddress()]))/*address */ {
            if (Validation::checkAddress($studentEntity->getAddress())) {
                $this->updateStudentByNameMessages[] = ["address field note is invalid/example valid: jl. example valid"];
                $updateStudentByNameSpecialAddressRequirement = false;
            }
            if (Validation::checkStringChar($studentEntity->getAddress())) {
                $this->updateStudentByNameMessages[] = ["address field char is invalid, create only with letters or numbers"];
                $updateStudentByNameSpecialAddressRequirement = false;
            }
            if (Validation::checkStringLenght($studentEntity->getAddress(), 5, 155)) {
                $this->updateStudentByNameMessages[] = ["address field min char is 5, and max is 155"];
                $updateStudentByNameSpecialAddressRequirement = false;
            }
            if ($updateStudentByNameSpecialAddressRequirement === true) {
                $pdoUpdateStudentByNameSpesialAddress = Database::start()->prepare("UPDATE student SET address = ? WHERE name = ?");
                $pdoUpdateStudentByNameSpesialAddress->bindValue(1, $studentEntity->getAddress(), PDO::PARAM_STR);
                $pdoUpdateStudentByNameSpesialAddress->bindValue(2, $names, PDO::PARAM_STR);
            }
        }
        if ($updateStudentByNameSpecialNameRequirement === true && $updateStudentByNameSpecialEmailRequirement === true && $updateStudentByNameSpecialAddressRequirement === true) {
            if (!empty($pdoUpdateStudentByNameSpecialName)) {
                $pdoUpdateStudentByNameSpecialName->execute();
                $pdoUpdateStudentByNameSpecialName = null;
            }
            if (!empty($pdoUpdateStudentByNameSpecialEmail)) {
                $pdoUpdateStudentByNameSpecialEmail->execute();
                $pdoUpdateStudentByNameSpecialEmail = null;
            }
            if (!empty($pdoUpdateStudentByNameSpesialAddress)) {
                $pdoUpdateStudentByNameSpesialAddress->execute();
                $pdoUpdateStudentByNameSpesialAddress = null;
            }
        }
        $pdoUpdateStudentByNameSpecialName = null;
        $pdoUpdateStudentByNameSpecialEmail = null;
        $pdoUpdateStudentByNameSpesialAddress = null;

        $pdoUpdateStudentByNameResult = Database::start()->prepare("SELECT id, name, email, address FROM student WHERE name = ?");
        if (!empty($studentEntity->getName())) {
            $pdoUpdateStudentByNameResult->bindValue(1, $studentEntity->getName(), PDO::PARAM_STR);
            $pdoUpdateStudentByNameResult->execute();
            return Response::jsonFiles(true, $pdoUpdateStudentByNameResult->fetchAll(PDO::FETCH_ASSOC), []);
            $pdoUpdateStudentByNameResult = null;
        } else {
            $pdoUpdateStudentByNameResult->bindValue(1, $names, PDO::PARAM_STR);
            $pdoUpdateStudentByNameResult->execute();
            return Response::jsonFiles(true, $pdoUpdateStudentByNameResult->fetchAll(PDO::FETCH_ASSOC), []);
            $pdoUpdateStudentByNameResult = null;
        }
        $pdoUpdateStudentByNameResult = null;
    }

    //find all
    public function findAllRepository(): array
    {
        $pdoFindAllStudent =  Database::start()->prepare("SELECT id, name, email, address FROM student");
        $pdoFindAllStudent->execute();
        return $pdoFindAllStudent->fetchAll(PDO::FETCH_ASSOC);
        $pdoFindAllStudent = null;
    }
    //find one by id
    public function findOneByIdRepository(entities\StudentEntity $studentEntity): array
    {
        //empty validation
        if (Validation::checkEmpty([$studentEntity->getId()])) {
            return Response::jsonFiles(false, [], ["id parameter is required"]);
        } else {
            $pdoFindOneStudentById =  Database::start()->prepare("SELECT id, name, email, address FROM student WHERE id = :id");
            $pdoFindOneStudentById->bindValue(":id", $studentEntity->getId(), PDO::PARAM_INT);
            $pdoFindOneStudentById->execute();
            $pdoFindOneStudentByIdResult =  $pdoFindOneStudentById->fetchAll(PDO::FETCH_ASSOC);
            if (empty($pdoFindOneStudentByIdResult)) {
                return Response::jsonFiles(false, [], ["no data with id: " . $studentEntity->getId()]);
            } else {
                return $pdoFindOneStudentByIdResult;
            }
            $pdoFindOneStudentById = null;
            $pdoFindOneStudentByIdResult = null;
        }
    }
    //find by name
    public function findByNameRepository(entities\StudentEntity $studentEntity): array
    {
        $pdoFindStudentByName = Database::start()->prepare("SELECT id, name, email, address FROM student WHERE name = :name");
        $pdoFindStudentByName->bindValue(":name", $studentEntity->getName(), PDO::PARAM_STR);
        $pdoFindStudentByName->execute();
        $pdoFindStudentByNameResult = $pdoFindStudentByName->fetchAll(PDO::FETCH_ASSOC);
        if (empty($pdoFindStudentByNameResult)) {
            return Response::jsonFiles(false, [], ["no data with name: " . $studentEntity->getName()]);
        } else {
            return $pdoFindStudentByNameResult;
        }
        $pdoFindStudentByName =  null;
        $pdoFindStudentByNameResult = null;
    }
    //delete by id
    public function deleteOneByIdRepository(entities\StudentEntity $studentEntity): array
    {
        $pdoDeleteOneStudentByIdResult = Database::start()->prepare("SELECT id, name, email, address FROM student WHERE id = :id");
        $pdoDeleteOneStudentByIdResult->bindValue(":id", $studentEntity->getId(), PDO::PARAM_INT);
        $pdoDeleteOneStudentByIdResult->execute();

        $pdoDeleteOneStudentById = Database::start()->prepare("DELETE FROM student WHERE id = ?");
        $pdoDeleteOneStudentById->bindValue(1, $studentEntity->getId(), PDO::PARAM_INT);
        $pdoDeleteOneStudentById->execute();
        $deleted = $pdoDeleteOneStudentById->rowCount();
        if ($deleted === 1) {
            $deleted = null;
            $pdoDeleteOneStudentById = null;
            return Response::jsonFiles(true, $pdoDeleteOneStudentByIdResult->fetchAll(PDO::FETCH_ASSOC), [$pdoDeleteOneStudentByIdResult->rowCount() . " data deleted"]);
            $pdoDeleteOneStudentByIdResult = null;
        } else {
            $pdoDeleteOneStudentByIdResult = null;
            $deleted = null;
            $pdoDeleteOneStudentById = null;
            return Response::jsonFiles(false, [], ["no data with id: " . $studentEntity->getId()]);
        }
        $pdoDeleteOneStudentByIdResult = null;
        $deleted = null;
        $pdoDeleteOneStudentById = null;
    }
    //delete by name
    public function deleteByNameRepository(entities\StudentEntity $studentEntity): array
    {
        $pdoDeleteStudentByNameResult = Database::start()->prepare("SELECT id, name, email, address FROM student WHERE name = :name");
        $pdoDeleteStudentByNameResult->bindValue(":name", $studentEntity->getName(), PDO::PARAM_STR);
        $pdoDeleteStudentByNameResult->execute();


        $pdoDeleteStudentByName = Database::start()->prepare("DELETE FROM student WHERE name = :name");
        $pdoDeleteStudentByName->bindValue(":name", $studentEntity->getName(), PDO::PARAM_STR);
        $pdoDeleteStudentByName->execute();
        $deleted = $pdoDeleteStudentByName->rowCount();
        if ($deleted > 0) {
            $deleted = null;
            $pdoDeleteStudentByName = null;
            return Response::jsonFiles(true, $pdoDeleteStudentByNameResult->fetchAll(PDO::FETCH_ASSOC), [$pdoDeleteStudentByNameResult->rowCount() . " data deleted"]);
            $pdoDeleteStudentByNameResult = null;
        } else {
            $pdoDeleteStudentByNameResult = null;
            $deleted = null;
            $pdoDeleteStudentByName = null;
            return Response::jsonFiles(false, [], ["no data with name: " . $studentEntity->getName()]);
        }
        $pdoDeleteStudentByNameResult = null;
        $deleted = null;
        $pdoDeleteStudentByName = null;
    }
}
