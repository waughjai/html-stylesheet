HTML Stylesheets
=========================

Simple class for easy generation o' stylesheets.


## Use

Just call constructor with 1st argument a string representing the URL, & 2 optional arguments for a file loader & an array o' extra attributes to add to the HTML tag.


## Example

	WaughJ\HTMLStylesheet\HTMLStylesheet;

	new HTMLStylesheet
	(
		'main',
		new FileLoader([ 'directory-url' => 'https://www.example.com/css' ]),
		[ 'media' => 'print' ]
	);

Will output:

	<link href="https://www.example.com/css/main.css" rel="stylesheet" media="print" />
