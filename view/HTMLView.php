<?php
namespace View;

class HTMLView
{
	public function getHTMLPage($body,$errors,$successes)
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
							'.$successes.'
							'.$errors.'
							'.$body.'							
						</div>
					</body>
				</html>';
	}
}
