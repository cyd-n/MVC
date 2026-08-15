<?php
    class ErrorController extends Controller{
        public function Index(){
            $this->View('');
        }

        public function _400(){ // Bad Request
            //$this->View('Error/_400');
            echo "ERROR 400 - BAD REQUEST";
            echo '<a href="/" class="btn">TRY AGAIN LATER</a>';
        }

        public function _401(){ // Unauthorized
            //$this->View('Error/_401');
            echo "ERROR 401 - UNAUTHORIZED";
            echo '<a href="/" class="btn">GO AWAY FROM THIS ILLIGAL PAGE</a>';
        }

        public function _402(){ // Payment Required
            //$this->View('Error/_402');
            echo "ERROR 402 - PAYMENT REQUIRED";
            echo '<a href="/" class="btn">GO AWAY OR PAY</a>';
        }

        public function _403(){ // Forbidden
            //$this->View('Error/_403);
            echo "ERROR 403 - FORBIDDEN";
            echo '<a href="/" class="btn">RUN AWAY</a>';
        }

        public function _404(){ // Page is not exiting
            $this->View('Error/_404');
        }

        public function _405(){ // Methode is not exiting or to way to exists the methode
            $this->View('Error/_405');
        }

        public function _406(){ // Not Acceptable
            //$this->View('Error/_406);
            echo "ERROR 406 - NOT ACCEPTABLE";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _407(){ // Proxy Authentication Required
            //$this->View('Error/_407);
            echo "ERROR 407 - PROXY AUTHENTICATION REQUIRED";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _408(){ // Request Timeout
            //$this->View('Error/_408);
            echo "ERROR 408 - REQUEST TIMEOUT";
            echo '<a href="/" class="btn">WAIT</a>';
        }

        public function _409(){ // Conflict
            //$this->View('Error/_409);
            echo "ERROR 409 - CONFLICT";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _410(){ // Gone
            //$this->View('Error/_410);
            echo "ERROR 410 - GONE";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _411(){ // Length Required
            //$this->View('Error/_411);
            echo "ERROR 411 - Length Required";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _412(){ // Precondition Failed
            //$this->View('Error/_412);
            echo "ERROR 412 - PRECONDITION FAILED";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _413(){ // Content Too Large
            //$this->View('Error/_413);
            echo "ERROR 413 - CONTENT TOO LARGE";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _414(){ // URI too long
            //$this->View('Error/_414);
            echo "ERROR 414 - URI TOO LONG";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _415(){ // Unsupported Media Type
            //$this->View('Error/_415);
            echo "ERROR 415 - UNSUPPORTED MEDIA TYPE";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _416(){ // Range Not Satisfiable
            //$this->View('Error/_416);
            echo "ERROR 416 - RANGE NOT SATISFIABLE";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _417(){ // Expectation Failed
            //$this->View('Error/_417);
            echo "ERROR 417 - EXPECTATION FAILED";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _418(){ // I'm a teapot
            $this->View('Error/_418');
        }

        public function _421(){ // Misdirected Request
            //$this->View('Error/_421);
            echo "ERROR 421 - MISDIRECTED REQUEST";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _422(){ // Unprocessable Content
            //$this->View('Error/_422);
            echo "ERROR 422 - UNPROCESSABLE";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _423(){ // Locked
            //$this->View('Error/_423);
            echo "ERROR 423 - LOCKED";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _424(){ // Failed Dependency
            //$this->View('Error/_424);
            echo "ERROR 424 - FAILED DEPENDENCY";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _425(){ // Too Ealry
            //$this->View('Error/_425);
            echo "ERROR 425 - TOO EALRY";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _426(){ // Upgrade Required
            //$this->View('Error/_426);
            echo "ERROR 426 - UPGRADE REQUIRED";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _428(){ // Precondition Required
            //$this->View('Error/_428);
            echo "ERROR 428 - PRECONDITION REQUIRED";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _429(){ // Too Many Requests
            //$this->View('Error/_429);
            echo "ERROR 429 - TOO MANY REQUESTS";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _431(){ // Request Header Fields Too Large
            //$this->View('Error/_431);
            echo "ERROR 431 - REQUEST HEADER FIELDS TOO LARGE";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _451(){ // Unavailable For Legal Reasons
            //$this->View('Error/_451);
            echo "ERROR 451 - UNAVAILABLE FOR LEGAL REASONS";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

    // ERROR 500
        public function _500(){ // Internal Server Error
            //$this->View('Error/_500);
            echo "ERROR 500 - INTERNAL SERVER ERROR";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _501(){ // Not Implemented
            //$this->View('Error/_501);
            echo "ERROR 501 - NOT IMPLEMENTED";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _502(){ // Bad Gateway
            //$this->View('Error/_502);
            echo "ERROR 502 - BAD GATEWAY";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _503(){ // Service Unavailable
            //$this->View('Error/_503);
            echo "ERROR 503 - SERVICE UNAVAILABLE";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _504(){ // Gateway Timeout
            //$this->View('Error/_504);
            echo "ERROR 504 - GATEWAY TIMEOUT";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _505(){ // HTTP Version Not Supported
            //$this->View('Error/_505);
            echo "ERROR 505 - HTTP VERSION NOT SUPPORTED";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _506(){ // Variant Also Negotiates
            //$this->View('Error/_506);
            echo "ERROR 506 - VARIANT ALSO NEGOTIATES";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _507(){ // Insufficient Storage
            //$this->View('Error/_507);
            echo "ERROR 507 - INSUFFICIENT STORAGE";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _508(){ // Loop Detected 
            //$this->View('Error/_508);
            echo "ERROR 508 - LOOP DETECTED";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _510(){ // Not Extended
            //$this->View('Error/_510);
            echo "ERROR 507 - NOT EXTENDED";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }

        public function _511(){ // Network Authentication Required
            //$this->View('Error/_511);
            echo "ERROR 511 - NETWORK AUTHENTICATION REQUIRED";
            echo '<a href="/" class="btn">UGH!!!</a>';
        }
    }
?>
