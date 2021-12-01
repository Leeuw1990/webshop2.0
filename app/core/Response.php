<?php

namespace app\core;

class Response
{
    public function setStatusCode($code)
    {
        http_response_code($code);
    }
    // Zorgt ervoor dat er een status code 404 (Not found) gemeld wordt in DEV. TOOLS Network.
}