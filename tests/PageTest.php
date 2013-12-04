<?php
require_once dirname(__FILE__) . '/../Page.php';
require_once dirname(__FILE__) . '/../User.php';
require_once dirname(__FILE__) . '/../Database.php';

class PageTest extends PHPUnit_Framework_TestCase{
  public function testHoge(){
    $dbMock = $this->getMock('Database');
    $dbMock->expects($this->once())
            ->method('write')
            ->with($this->equalTo('New Title'), $this->equalTo('aaa wrote: "New Title" New Text'));
    
    $userStub = $this->getMock('User');
    $userStub->expects($this->any())
            ->method('getName')
            ->will($this->returnValue('aaa'));
    
    $page = new Page();
    $page->setDatabase($dbMock);
    $page->setUser($userStub);
    $page->setBody('New Text');
    $page->setTitle('New Title');
    $page->save();
  }
}