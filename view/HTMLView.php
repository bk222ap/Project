<?php
namespace View;

class HTMLView
{
	public function getHTMLPage($body)
	{
		return'<!DOCTYPE HTML>
				<html>
					<head>
						<title> Första sidan </title>
					</head>
					<body>
						<div id="mainBody">
							<H1>Stuff goes here</H1>
							'.$body.'							
						</div>
					</body>
				</html>';
	}
}
