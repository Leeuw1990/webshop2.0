<?php

class ErrorPage extends BasePage {

  public function render() {
    return 
      '<div>
        <h1>Error</h1>
        <p>404: Page not Found</p>
      </div>';
  }
}