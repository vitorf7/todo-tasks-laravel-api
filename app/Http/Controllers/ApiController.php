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
     * @param $items
     * @param $data
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function respondWithPagination( $items, $data )
    {
        $paginated_items = $items->toArray();

        $data = array_merge( $data, array(
            'total_count' => $paginated_items[ 'total' ],
            'per_page' => (int) $paginated_items[ 'per_page' ],
            'current_page' => $paginated_items[ 'current_page' ],
            'total_pages' => $paginated_items[ 'last_page' ],
            'from' => $paginated_items[ 'from' ],
            'to' => $paginated_items[ 'to' ],
            'next_page' => $paginated_items[ 'next_page_url' ],
            'previous_page' => $paginated_items[ 'prev_page_url' ]
        ) );

        return $this->respond( $data );
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