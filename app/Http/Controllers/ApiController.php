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
    public function respondNotFound( $message = 'Not Found!' )
    {
        return response(array(
            'error'     => array(
                'message'       => $message,
                'status_code'   => $this->setStatusCode(404)->getStatusCode()
            )
        ));
    }

}