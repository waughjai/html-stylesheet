<?php

use PHPUnit\Framework\TestCase;
use WaughJ\FileLoader\FileLoader;
use WaughJ\HTMLStylesheet\HTMLStylesheet;

class HTMLStylesheetTest extends TestCase
{
	public function testBasicStylesheet()
	{
		$stylesheet = new HTMLStylesheet( 'main' );
		$this->assertEquals( '<link href="main.css" rel="stylesheet" />', $stylesheet->getHTML() );
	}

	public function testWithCustomLoader()
	{
		$stylesheet = new HTMLStylesheet( 'main', new FileLoader([ 'directory-url' => 'https://www.example.com/css' ]) );
		$this->assertEquals( '<link href="https://www.example.com/css/main.css" rel="stylesheet" />', $stylesheet->getHTML() );
	}

	public function testWithAttributes()
	{
		$stylesheet = new HTMLStylesheet( 'main', new FileLoader([ 'directory-url' => 'https://www.example.com/css' ]), [ 'media' => 'print' ] );
		$this->assertEquals( '<link href="https://www.example.com/css/main.css" rel="stylesheet" media="print" />', $stylesheet->getHTML() );
	}
}
