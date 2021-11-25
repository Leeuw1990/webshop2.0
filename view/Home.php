<?php

class Home extends BasePage {

    public function render() {
      return 
        "<div>
          <h1>Home</h1>
          <p>This is the website for my tutorial.</p>
          <a href='/login'>Login</a>
          <a href='/register'>Register</a>
          <a href='/shop'>Shop</a>
        </div>";
    }
  }