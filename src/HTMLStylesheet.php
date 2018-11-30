<?php

declare( strict_types = 1 );
namespace WaughJ\HTMLStylesheet
{
	use WaughJ\FileLoader\FileLoader;
	use WaughJ\HTMLAttributeList\HTMLAttributeList;

	class HTMLStylesheet
	{
		public function __construct( string $url, FileLoader $loader = null, array $other_attributes = [] )
		{
			$this->url = $url;
			$this->loader = ( $loader ) ? $loader->changeExtension( 'css' ) : new FileLoader([ 'extension' => 'css' ]);
			unset( $other_attributes[ 'href' ], $other_attributes[ 'rel' ] );
			$this->other_attributes = new HTMLAttributeList( $other_attributes );
		}

		public function getHTML() : string
		{
			return "<link href=\"{$this->getSource()}\" rel=\"stylesheet\"{$this->other_attributes->getAttributesText()} />";
		}

		public function getSource() : string
		{
			return $this->loader->getSourceWithVersion( $this->url );
		}

		private $url;
		private $loader;
		private $other_attributes;
	}
}
