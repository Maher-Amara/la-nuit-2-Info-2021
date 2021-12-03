<?php 
	function show_project($project){
		$HTML = ''.
		'<div>'.
		'<h2>'.
		'<a href="/projects/' . $project['nameId'] . '">'.
		$project['title'].
		'</a>'.
		' (' . $project['categorieId'] .')'.
		'</h2>'.
		'<p>' . $project['description'] . '</p>'.
		'</div>';
		
		echo $HTML;
		
	}

	echo "<h1>Projects</h1>";
	echo "<a href=\"/sitemap.html\">Sitemap</a>";

	foreach ($projects as $project){
		show_project($project);
	};
