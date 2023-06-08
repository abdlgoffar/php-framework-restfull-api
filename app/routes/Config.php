<?php

namespace route {
    class Config
    {
        //auth
        private string $auth = "default data";
        public function getAuth(): string
        {
            return $this->auth;
        }
        public function setAuth(string $auth): void
        {
            $this->auth = $auth;
        }
        //type controllers available
        const REST_CONTROLLER = "REST_CONTROLLER";
        const WEB_CONTROLLER = "WEB_CONTROLLER";
        //http method available
        const HTTP_METHOD_GET = "GET";
        const HTTP_METHOD_POST = "POST";
        const HTTP_METHOD_PUT = "PUT";
        const HTTP_METHOD_DELETE = "DELETE";
        //controller method available
        const METHOD_AUTHORIZATION = "auth";
        const METHOD_FIND_ALL = "findAll";
        const METHOD_FIND_ONE_BY_ID = "findOneById";
        const METHOD_FIND_BY_NAME = "findByName";
        const METHOD_CREATE = "create";
        const METHOD_ADD = "add";
        const METHOD_UPDATE_ONE_BY_ID = "updateOneById";
        const METHOD_UPDATE_BY_NAME = "updateByName";
        const METHOD_DELETE_ONE_BY_ID = "deleteOneById";
        const METHOD_DELETE_BY_NAME = "deleteByName";
    }
}
