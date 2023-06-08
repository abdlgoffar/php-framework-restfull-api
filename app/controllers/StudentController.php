<?php


class StudentController
{
    private entities\StudentEntity $studentEntity;
    private StudentServiceImplement $studentService;
    //constructor
    public function __construct()
    {
        $this->studentEntity = new entities\StudentEntity();
        $this->studentService = new StudentServiceImplement();
    }
    //create or add
    public function create(): void
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
         * The Access-Control-Allow-Methods response header specifies one or more methods allowed when accessing a resource in response to a preflight request.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Methods menentukan satu atau beberapa metode yang diizinkan saat mengakses sumber daya sebagai respons terhadap permintaan preflight.
         */
        header("Allow: GET, POST, OPTIONS, PUT, DELETE"); // simplenya opsi-opsi http method lain yang bisa diterima oleh server selain secara spesifik dilakukan oleh: header("Access-Control-Allow-Methods: POST").
        /**
         * The Access-Control-Allow-Headers response header is used in response to a preflight request which includes the Access-Control-Request-Headers to indicate which HTTP headers can be used during the actual request.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Headers digunakan sebagai respons terhadap permintaan preflight yang menyertakan Access-Control-Request-Headers untuk menunjukkan header HTTP mana yang dapat digunakan selama permintaan sebenarnya.
         */
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");
        $student = json_decode(file_get_contents("php://input"));
        if (!empty($student->name)) {
            $this->studentEntity->setName($student->name);
        }
        if (!empty($student->email)) {
            $this->studentEntity->setEmail($student->email);
        }
        if (!empty($student->address)) {
            $this->studentEntity->setAddress($student->address);
        }
        echo json_encode($this->studentService->createService($this->studentEntity));
    }
    //update one by id
    public function updateOneById($id): void
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
        header("Access-Control-Allow-Methods: PUT"); //simplenya http method yang bisa di terima oleh server.

        /**
         * The Access-Control-Allow-Methods response header specifies one or more methods allowed when accessing a resource in response to a preflight request.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Methods menentukan satu atau beberapa metode yang diizinkan saat mengakses sumber daya sebagai respons terhadap permintaan preflight.
         */
        header("Allow: GET, POST, OPTIONS, PUT, DELETE"); // simplenya opsi-opsi http method lain yang bisa diterima oleh server selain secara spesifik dilakukan oleh: header("Access-Control-Allow-Methods: PUT").

        /**
         * The Access-Control-Allow-Headers response header is used in response to a preflight request which includes the Access-Control-Request-Headers to indicate which HTTP headers can be used during the actual request.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Headers digunakan sebagai respons terhadap permintaan preflight yang menyertakan Access-Control-Request-Headers untuk menunjukkan header HTTP mana yang dapat digunakan selama permintaan sebenarnya.
         */
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");
        $student = json_decode(file_get_contents("php://input"));
        if (!empty($id) && is_numeric($id)) {
            $this->studentEntity->setId($id);
        }
        if (!empty($student->name)) {
            $this->studentEntity->setName($student->name);
        }
        if (!empty($student->email)) {
            $this->studentEntity->setEmail($student->email);
        }
        if (!empty($student->address)) {
            $this->studentEntity->setAddress($student->address);
        }
        echo json_encode($this->studentService->updateOneByIdService($this->studentEntity));
    }

    //uppdate by name
    public function updateByName($names): void
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
        header("Access-Control-Allow-Methods: PUT"); //simplenya http method yang bisa di terima oleh server.

        /**
         * The Access-Control-Allow-Methods response header specifies one or more methods allowed when accessing a resource in response to a preflight request.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Methods menentukan satu atau beberapa metode yang diizinkan saat mengakses sumber daya sebagai respons terhadap permintaan preflight.
         */
        header("Allow: GET, POST, OPTIONS, PUT, DELETE"); // simplenya opsi-opsi http method lain yang bisa diterima oleh server selain secara spesifik dilakukan oleh: header("Access-Control-Allow-Methods: PUT").

        /**
         * The Access-Control-Allow-Headers response header is used in response to a preflight request which includes the Access-Control-Request-Headers to indicate which HTTP headers can be used during the actual request.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Headers digunakan sebagai respons terhadap permintaan preflight yang menyertakan Access-Control-Request-Headers untuk menunjukkan header HTTP mana yang dapat digunakan selama permintaan se benarnya.
         */
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");
        $student = json_decode(file_get_contents("php://input"));
        if (!empty($student->name)) {
            $this->studentEntity->setName($student->name);
        }
        if (!empty($student->email)) {
            $this->studentEntity->setEmail($student->email);
        }
        if (!empty($student->address)) {
            $this->studentEntity->setAddress($student->address);
        }
        echo json_encode($this->studentService->updateByNameService($this->studentEntity, $names));
    }
    //find all
    public function findAll(): void
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
        header("Access-Control-Allow-Methods: GET"); //simplenya http method yang bisa di terima oleh server.

        /**
         * The Access-Control-Allow-Headers response header is used in response to a preflight request which includes the Access-Control-Request-Headers to indicate which HTTP headers can be used during the actual request.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Headers digunakan sebagai respons terhadap permintaan preflight yang menyertakan Access-Control-Request-Headers untuk menunjukkan header HTTP mana yang dapat digunakan selama permintaan se benarnya.
         */
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");


        echo json_encode($this->studentService->findAllService());
    }

    //find one by id
    public function findOneById($id): void
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
        header("Access-Control-Allow-Methods: GET"); //simplenya http method yang bisa di terima oleh server.

        /**
         * The Access-Control-Allow-Headers response header is used in response to a preflight request which includes the Access-Control-Request-Headers to indicate which HTTP headers can be used during the actual request.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Headers digunakan sebagai respons terhadap permintaan preflight yang menyertakan Access-Control-Request-Headers untuk menunjukkan header HTTP mana yang dapat digunakan selama permintaan se benarnya.
         */
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

        if (!empty($id) && is_numeric($id)) {
            $this->studentEntity->setId($id);
        }

        echo json_encode($this->studentService->findOneByIdService($this->studentEntity));
    }
    //find by name
    public function findByName($name): void
    {
        /**
         * The Access-Control-Allow-Origin response header indicates whether the response can be shared with requesting code from the given origin.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Al  low-Origin menunjukkan apakah respons dapat dibagikan dengan meminta kode dari asal yang diberikan.
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
        header("Access-Control-Allow-Methods: GET"); //simplenya http method yang bisa di terima oleh server.

        /**
         * The Access-Control-Allow-Headers response header is used in response to a preflight request which includes the Access-Control-Request-Headers to indicate which HTTP headers can be used during the actual request.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Headers digunakan sebagai respons terhadap permintaan preflight yang menyertakan Access-Control-Request-Headers untuk menunjukkan header HTTP mana yang dapat digunakan selama permintaan se benarnya.
         */
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");
        if (!empty($name)) {
            $this->studentEntity->setName($name);
        }
        echo json_encode($this->studentService->findByNameService($this->studentEntity));
    }
    //delete one by id
    public function deleteOneById($id): void
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
        header("Access-Control-Allow-Methods: DELETE"); //simplenya http method yang bisa di terima oleh server.

        /**
         * The Access-Control-Allow-Headers response header is used in response to a preflight request which includes the Access-Control-Request-Headers to indicate which HTTP headers can be used during the actual request.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Headers digunakan sebagai respons terhadap permintaan preflight yang menyertakan Access-Control-Request-Headers untuk menunjukkan header HTTP mana yang dapat digunakan selama permintaan se benarnya.
         */
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");
        if (!empty($id) && is_numeric($id)) {
            $this->studentEntity->setId($id);
        }
        echo json_encode($this->studentService->deleteOneByIdService($this->studentEntity));
    }


    //delete by name
    public function deleteByName($name): void
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
        header("Access-Control-Allow-Methods: DELETE"); //simplenya http method yang bisa di terima oleh server.

        /**
         * The Access-Control-Allow-Headers response header is used in response to a preflight request which includes the Access-Control-Request-Headers to indicate which HTTP headers can be used during the actual request.
         * SUBTITLE INDONESIA:  Header respons Access-Control-Allow-Headers digunakan sebagai respons terhadap permintaan preflight yang menyertakan Access-Control-Request-Headers untuk menunjukkan header HTTP mana yang dapat digunakan selama permintaan se benarnya.
         */
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

        if (!empty($name)) {
            $this->studentEntity->setName($name);
        }
        echo json_encode($this->studentService->deleteByNameService($this->studentEntity));
    }
}
