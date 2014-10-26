<?php
namespace View;

class HTMLView
{
	public function getHTMLPage($body)
	{
		return'<!DOCTYPE HTML>
				<html>
					<head>
						<meta charset="utf-8" />
						<link rel="stylesheet" href="css/site.css" />
						<title> ChampBuilder </title>
					</head>
					<body>
						<div id="mainBody">
							<H1>Champ Builder</H1>
							'.$body.'							
						</div>
					</body>
				</html>';
	}
}
