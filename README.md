# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



## Installation

### Was wird benötigt bzw. auf was hab ich es laufen lassen?

- PHP 7.3 (Die PHP Version von XAMPP)
- Composer

### Vor der Installation:

Unter /database/migrations und dann die erste Datei für create people table muss angepasst werden dort habe ich schonmal den ersten User voreingestellt, allerdings müsst ihr dort das Passwort oder den User allgemein vorher nochmal anpassen bevor ihr die Tables der Datenbank migratet

### Schritte um es zum laufen zu bekommen(local)

- XAMPP mysql server starten
- composer install
- npm install
- Danach eine .env Datei erstellen -> Aufbau steht in der .env.example im root verzeichnis

  - Hier ist wichtig, dass die Datenbank dafür vorher erstellt wird, sonst funktioniert es beim migrate nicht
- Um einen Testserver zu starten dann ins Terminal:
  - php -S localhost:8000 -t public
- Und in einem weiteren Terminal für Tailwind:
  - npm run watch
- Nun sollte es Local laufen und mit http.//localhost:8000/login kommt man auf die Loginseite



### Weitere Informationen:

#### /login:

- Daten merken und Passwort vergessen haben noch beide keine Funktion

#### /dashboard

- IFrame (für die Toiletten) ist noch das alte eingebaut, allerdings ist über dem IFrame ein Beispiel, wie es stattdessen aussehen könnte (nur ein Vorschlag)

#### /profile

- Habe ich erstmal nicht dran weitergearbeitet, aber hier könnte man später sein Profil bearbeiten und eventuell sein Passwort ändern?

#### /employees

- JavaScript für den Teil müsste noch gemacht werden

#### /manageEmployees

- Hier ist ein Überblick über alle Mitarbeiter und dort kann man neue Nutzer anlegen (Hier könnte man später optional im Modal noch hinzufügen bei der Erstellung, ob der neue User ein Admin sein soll oder nicht, man könnte es aber auch über die Datenbank einstellen -> Default ist false also kein Admin)

#### /vacations

- Hier kann man Eingehende Urlaubsanträge als Admin einsehen
- Die beiden Buttons Alle akzeptieren und Alle Ablehnen haben noch keine Funktion

#### /calendar

- Größtenteils sind alle Funktionen da
- Urlaube werden angezeigt
  - Ganztags / Halbtags
- Urlaub kann beantragt werden
- Feiertage und Ferien werden angezeigt (Die APIs müssten Jährlich gepflegt werden)
- Feiertage werden leider noch nicht raus gerechnet aus dem Urlaub, da ich für dort noch keine richtige Lösung gefunden habe
