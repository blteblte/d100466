d100466
=======

LV: INSTRUKCIJA
---------------------------------------------------------------------
---------------------------------------------------------------------
phpAJAX: WEB platforma spējai uz AJAX balstītu lietotņu izveidei
autors: Mārtiņš Bitenieks, DU 2014
produkta versija: 0.9
---------------------------------------------------------------------
---------------------------------------------------------------------
ATBALSTĪTĀS PLATFORMAS:
Windows, OS X, Linux

TEHNISKĀS PRASĪBAS:
Platforma ir saderīga ar jebkuru izstrādes vidi un operētājsistēmu,
kas spēj sevī nodrošināt PHP instalācijas distributīvu, kā arī
datu bāzes distributīvu kas saderīgs ar PHP PDO draiveri.

IETEICAMĀS PAPILDPLATFORMAS:
PHP v4.3 un augstāk, MySQL 5.1 un augstāk

UZSTĀDĪŠANAS INSTRUKCIJA:
1. Nokopē pirmkoda failus projekta saknes direktorijā. Ja projekta
sakne nav arī servera sakne, tad norāda konfigurācijas failā apakš-
direktoriju:
	FAILS: /core/conf/configuration.php
	MAINĪGAIS: $root = "/projektaSakne"

2. Izveidot nepieciešamo datubāzi projektam un norādīt pieslēgšanās
parametrus:
	FAILS: /code/conf/db_connect.php
	MASĪVS:
		host - DB serveris
		dbname - DB nosaukums
		user - DB lietotājvārds
		pass - DB parole

3. Izpilda SQL skriptu reģistrēšanās moduļa darbībai:
	FAILS: /sql_db/tables.sql
	IZPILDE: izpilda izmantojamajā datu bāzē

TEHNISKĀ PALĪDZĪBA @ http://d100466.freeserver.me


ENG: README
---------------------------------------------------------------------
---------------------------------------------------------------------
phpAJAX: simple framework for agile WEB development based upon AJAX
author: Mārtiņš Bitenieks, DU 2014
product version: 0.9
---------------------------------------------------------------------
---------------------------------------------------------------------
SUPPORTED PLATFORMS:
Windows, OS X, Linux

TECHNICAL REQUIREMENTS:
Platform is compatible with whichever development platform which can
make use of PHP distribution and database compatible with PHP's PDO
driver.

RECOMMENDED SUB-PLATFORMS:
PHP v4.3 and higher, MySQL 5.1 and higher

CONFIGURATION INSTRUCTION:
1. Copy framework's source code to your project's root. If your
project's root is not server's root at a same time, define project's
path in following file:
	FILE: /core/conf/configuration.php
	CONSTANT: $root = "/projektaSakne"

2. Create needed database for your project and define connection
string:
	FILE: /code/conf/db_connect.php
	ARRAY:
		host - DB server
		dbname - DB name
		user - DB user name
		pass - DB password

3. Execute SQL script for registration module to work:
	FILE: /sql_db/tables.sql
	EXECUTE: execute in used database for your project

SUPPORT @ http://d100466.freeserver.me
