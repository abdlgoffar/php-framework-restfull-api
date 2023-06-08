<?php

namespace entities {
    class StudentEntity
    {
        private int $id = 0;
        public function getId(): int
        {
            return $this->id;
        }
        public function setId(int $id): void
        {
            $this->id = $id;
        }

        private string $name = '';
        public function getName(): string
        {
            return $this->name;
        }
        public function setName(string $name): void
        {
            $this->name = $name;
        }

        private string $email = '';
        public function getEmail(): string
        {
            return $this->email;
        }
        public function setEmail(string $email): void
        {
            $this->email = $email;
        }

        private string $address = '';
        public function getAddress(): string
        {
            return $this->address;
        }
        public function setAddress(string $address): void
        {
            $this->address = $address;
        }
    }
}
