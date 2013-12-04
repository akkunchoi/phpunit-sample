<?php
class Page{
  protected $user;
  protected $title;
  protected $body;
  protected $database;
  
  public function setUser($user) {
    $this->user = $user;
  }

  public function setTitle($title) {
    $this->title = $title;
  }

  public function setBody($body) {
    $this->body = $body;
  }
  
  public function setDatabase(Database $database){
    $this->database = $database;
  }

  public function save(){
    $s = sprintf(
      '%s wrote: "%s" %s', $this->user->getName(), $this->title, $this->body
    );
    $this->database->write($this->title, $s);
  }
}