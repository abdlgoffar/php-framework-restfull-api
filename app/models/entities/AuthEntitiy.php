<?php

namespace entities {
    class AuthEntity
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
        private string $email = '';
        public function getEmail(): string
        {
            return $this->email;
        }
        public function setEmail(string $email): void
        {
            $this->email = $email;
        }
        private string $token = '';
        public function getToken(): string
        {
            return $this->token;
        }
        public function setToken(string $token): void
        {
            $this->token = $token;
        }
    }
}
