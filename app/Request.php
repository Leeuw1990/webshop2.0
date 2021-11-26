<?php
include_once 'IRequest.php';

// Dit bevat een request class wat objecten initialiseert wat informatie bevat over de http request.

class Request implements IRequest
{
  function __construct()
  {
    $this->bootstrapSelf();
  }

// Een functie die automatisch de waarde ophaald uit de browser.
  private function bootstrapSelf()
  {
    foreach($_SERVER as $key => $value)
    {
      $this->{$this->toCamelCase($key)} = $value;
    //   var_dump("bootstrapself!!!!". $value. "</br>");
    }
  }


  // zet een normale string om naar camelCase.
  private function toCamelCase($string)
  {
    $result = strtolower($string);
    

        
    preg_match_all('/_[a-z]/', $result, $matches);

    foreach($matches[0] as $match)
    {
        $c = str_replace('_', '', strtoupper($match));
        $result = str_replace($match, $c, $result);
    }

    return $result;
    // var_dump("toCalemlCase!".$result);
  }

  public function getBody()
  {
    if($this->requestMethod === "GET")
    {
      return;
    }


    if ($this->requestMethod == "POST")
    {

      $body = array();
      foreach($_POST as $key => $value)
      {
        $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }

      return $body;
    //   var_dump("getBody: ". $body);
    }
  }
}