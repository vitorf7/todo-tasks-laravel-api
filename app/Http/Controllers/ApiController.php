<?php  namespace LaravelTodo\Http\Controllers; 

class ApiController extends Controller {

    /**
     * @var int $statusCode
     */
    protected $statusCode = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     *
     * @return $this
     */
    public function setStatusCode( $statusCode )
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondCreated( $message = 'Successfully Created.' )
    {
        return $this->setStatusCode(201)->respond(array(
            'message'   => $message
        ));
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondNotFound( $message = 'Not Found!' )
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondInternalError( $message = 'Internal Error!' )
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondUnprocessableEntity( $message = 'Unprocessable Request!' ){
        return $this->setStatusCode(422)->respondWithError($message);
    }

    /**
     * @param       $data
     * @param array $headers
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respond($data, $headers = array())
    {
        return response($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $message
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondWithError($message)
    {
        return $this->respond(array(
            'error'     => array(
                'message'       => $message,
                'status_code'   => $this->getStatusCode()
            )
        ));
    }

}