<?php
	$path = /*$_SERVER['DOCUMENTT_ROOT'].*/'tp4.db';
	if(!file_exists($path))
	{
		echo 'fail';
		throw new PDOException("Base de donnée pas trouvée");
	}
	$SQL_DSN = "sqlite:".$_SERVER['DOCUMENT_ROOT'].'/'.$path;
?>