<?php

use entities\AuthEntity;

class AuthController
{
    private AuthServiceImplement $authService;
    private entities\AuthEntity $authEntity;

    public function __construct()
    {
        $this->authService = new AuthServiceImplement();
        $this->authEntity = new AuthEntity();
    }
    public function auth()
    {
        /**
         * The Access-Control-Allow-Origin response header indicates whether the response can be shared with requesting code from the given origin.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Origin menunjukkan apakah respons dapat dibagikan dengan meminta kode dari asal yang diberikan.
         */
        header('Access-Control-Allow-Origin: *'); //simplenya digunakan untuk bisa menerima data dari website-website lain.
        /**
         * The function header("Content-type:application/json") sends the http json header to the browser to inform it what kind of data it expects.
         * SUBTITLE INDONESIA:  Fungsi header("Content-type:application/json") mengirimkan http json header ke browser untuk menginformasikan jenis data yang diharapkan.
         */
        header('Content-Type: application/json'); //simplenya jenis data file yang bisa dikirim atau terima client.
        /**
         * Access-Control-Allow-Methods is a header request that allows one or more HTTP methods when accessing a resource when responding to a preflight request. Access-Control-Allow-Methods shows permitted HTTP methods while accessing resources.
         * SUBTITLE INDONESIA:  Access-Control-Allow-Methods adalah permintaan header yang memungkinkan satu atau lebih metode HTTP saat mengakses sumber daya saat merespons permintaan preflight. Access-Control-Allow-Methods menampilkan metode HTTP yang diizinkan saat mengakses sumber daya.
         */
        header("Access-Control-Allow-Methods: POST"); //simplenya http method yang bisa di terima oleh server.
        /**
         * The Access-Control-Allow-Headers response header is used in response to a preflight request which includes the Access-Control-Request-Headers to indicate which HTTP headers can be used during the actual request.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Headers digunakan sebagai respons terhadap permintaan preflight yang menyertakan Access-Control-Request-Headers untuk menunjukkan header HTTP mana yang dapat digunakan selama permintaan sebenarnya.
         */
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");
        $auth = json_decode(file_get_contents("php://input"));

        if (!empty($auth->email)) {
            $this->authEntity->setEmail($auth->email);
        }
        echo json_encode($this->authService->createTokenService($this->authEntity));
    }
}
