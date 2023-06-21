<?php
declare(strict_types=1);
error_reporting(-1);

$concept = new \App\solutions\t3\Concept(new \App\solutions\t3\CuzzleHttp\Client());
//$stringToken = '1b78b76715687aa3584f80fc9d80df40ee7942b9c5ca9e5cbed0d653fb63839f';
//$concept->getToken(\App\solutions\t3\Concept::FILE_TOKEN)->set($stringToken);
$concept->getUserData(\App\solutions\t3\Concept::FILE_TOKEN);
