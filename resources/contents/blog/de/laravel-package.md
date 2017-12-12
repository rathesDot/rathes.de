---
id: 1558
title: 'Laravel 5: In wenigen Schritten zum Laravel 5 Package'
date: 2016-08-16T14:25:25+00:00
author: Rathes Sachchithananthan
template: post
image: /images/blog/laravel-logo.png
categories:
  - Web
tags:
  - Laravel
  - PHP
  - Webentwicklung
---
Du willst ein eigenes Package für Laravel entwickeln? Als ich mich das erste Mal damit beschäftigt habe, fand ich es recht schwer brauchbare Informationen oder eine Anleitung dafür zu finden. Dieser Beitrag soll die Lücke füllen und die eine Schritt für Schritt Anleitung liefern wie du in Laravel 5 eigene Packages entwickelst.

<!--more-->

## Allgemeines zu Laravel Packages

Laravel Packages sind die Möglichkeit deine Laravel Instanz um essenzielle Funktionalitäten zu erweitern. An sich ist das Laravel Framework auch ein solches Paket und es kommt mit vielen weiteren Paketen, die du im `vendor/` Verzeichnis deiner Laravel Installation findest. Diese müssen nicht unbedingt Laravel spezifische Pakete sein, die nur die Laravel Funktionalitäten erweitern, sondern können auch komplett von Laravel unabhängige Pakete sein. Bestes Beispiel dafür ist das [Carbon Paket](http://carbon.nesbot.com/docs/), das nicht nur in Laravel funktioniert, sondern auch Standalone in anderen PHP-Projekten.

In diesem Projekte zeige ich dir, wie du ganz einfach ein Package entwickelst, das die Laravel Funktionalität erweitert. Ich werde nur die ersten Schritte erläutern, aber ich denke, dass damit die grundlegendsten Fragen geklärt sein werden. Falls dir trotzdem etwas unklar sein sollte, kannst du dich gerne über die Kommentar-Funktion an mich wenden.

## Voraussetzungen

Um die folgenden Schritte durchführen zu können, erwarte ich, dass du Laravel in der 5er Variante bereits installiert und lauffähig bekommen hast. Ich benutze hier die Version Laravel 5.2, da diese die zum Zeitpunkt aktuellste Version ist.

Dass du Laravel installiert hast, setzt auch voraus, dass du composer bei dir installiert hast. Falls nicht solltest du das definitiv nachholen. Eine Anleitung wie du Composer installierst, findest du im [Getting Started Bereich der Composer Webseite](https://getcomposer.org/doc/00-intro.md).

Und natürlich solltest du wissen wie PHP funktioniert, aber das denke ich mal sollte klar sein 😉

## 1. Schritt: Package Vendor und Name

Als erstes solltest du im Root-Verzeichnis deiner Laravel Installation einen neuen Ordner `packages/` erstellen. In diesen Ordner kommt dein neues Package rein. Jedes Package besteht aus zwei Teilen: Einem Vendor-Namen und einem Package-Namen. Der Vendor-Name ist der Name des Erstellers dieses Pakets und der Package-Name ist dann der Name des Pakets. Zusammengenommen hast du dann eine vollständige Identifikation deines Pakets.

Schau einfach mal im `vendor/` deiner Laravel Installation nach: Dort findest du zum Beispiel einen Unterordner `laravel/` und darin den Unterordner `framework/`. Letzteres ist der Name des Pakets für das Laravel-Framework und **laravel** ist dann der Name des vendors. In der `composer.json` Datei findest du unter `require` dann den Eintrag `laravel/framework`. Diese sorgt dann dafür, dass genau dieses Paket geladen wird.

Wir wollen nun auch ein Paket erstellen und dieses heißt bei uns einfach **test** (Ich weiß, sehr kreativ) und der Vendor-Name lautet **aheenam**. Das ist der Name meiner [Digitalagentur Aheenam](https://aheenam.com), die viel mit Laravel arbeitet. Also erstellen wir uns im bereits erstellten `packages/` Ordner weitere Unterordner, sodass wir am Ende folgende Struktur haben:

```markup
packages/
    aheenam/
        test/
```

Im Test-Ordner erstellen wir noch einen weiteren Ordner `src/`, welcher später den Code des Packages beinhalten wird. Damit hätten wir vorerst die grobe Ordnerstruktur unseres neuen Pakets erstellt.

## 2. Schritt: Meta-Daten für unser Paket

Im zweiten Schritt definieren wir die Meta-Daten für unser Package. Diese werden in einer composer-Datei definiert. Dazu gehen wir über die Konsole zu unserem Paket und rufen von packages/Aheenam/test/ aus den Befehl `composer init` auf.

Hier werden dir dann schrittweise die Informationen zu deinem Paket abgefragt, die du hier beantwortest. Du kannst hier auch direkt Pakete definieren, die du für dein eigenes Paket benötigst. Für unser Projekt brauchen wir keines, daher belassen wir es einfach. Am Ende wird eine in deinem Ordner eine **composer.json** generiert, die so ähnlich wie folgende aussehen wird:

```json
{
    "name": "aheenam/test",
    "description": "A simple test for Laravel 5 packages created by Aheenam",
    "type": "laravel-package",
    "license": "MIT",
    "authors": [
        {
            "name": "Rathes Sachchithananthan",
            "email": "rathes@aheenam.com"
        }
    ],
    "minimum-stability": "dev",
    "require": {}
}
```

Jetzt haben wir unsere Struktur erstellt und auch unser Paket über Meta-Daten beschrieben. Im nächsten Schritt müssen wir unserer Laravel Instanz klarmachen, dass das Paket auch existiert.

## 3. Schritt: Autoloader für das Package erstellen

Dazu wechseln wir wieder in das Hauptverzeichnis unserer Laravel Installation. Dort finden wir die composer.json Datei der Laravel Instanz wieder. Dort findest du einen Abschnitt autoload, in welchem du unter psr-4 nun den Namespace deines Pakets eintragen musst. Das sieht in unserem Beispiel wie folgt aus:

```json
"autoload": {
    "classmap": [
        "database"
    ],
    "psr-4": {
        "App\\": "app/",
        "Aheenam\\Test\\": "packages/aheenam/test/src"
    }
}
```

Mit dem Befehl `composer dump-autoload` sorgst du dafür, dass der Autoloader aktualisiert wird und dein Paket nun auch geladen wird.

## 4. Schritt: Der Service Provider

Jetzt ist der Konfigurationsteil abgeschlossen und man kann anfangen das Paket mit Inhalt zu befüllen. Das Hauptelement eines Pakets ist der Service Provider. Dieser Service Provider ist quasi das Grundgerüst jedes Pakets und ist für das Registrieren und Laden bestimmter Elemente eines Laravel-Pakets zuständig. Selbst der Laravel-Core wird über Service Provider geladen. In der offiziellen Dokumentation findest du mehr [Informationen über die Service Provider](https://laravel.com/docs/5.2/providers). Hier werde ich nur die groben Funktionen erläutern, die in den kommenden Schritten benötigt werden.

Als erstes brauchen wir für unser Paket eine ServiceProvider-Datei, die `TestServiceProvider.php`. Diese legen wir im `src/` Ordner unseres Pakets an. Ich mache das immer folgendermaßen:

- Mit `php artisan make:provider TestServiceProvider` lasse ich mir einen ServiceProvider via artisan generieren.
- Dieser landet immer in `app/providers`. Von dort schiebe ich das dann in meinen Paket-Ordner. In unserem Falls also nach `packages/aheenam/test/src/`. Dabei muss ich natürlich auch daran denken den Namespace zu aktualisieren.

Wenn wir das erledigt haben, müssen wir nur noch die ServiceProvider-Datei mit unserer Laravel Installation verknüpfen. Dazu fügen wir einfach unseren neuen Service Provider in die Konfigurationsdatei der Anwendung hinzu. In der Datei `config/app.php` fügen wir also die Zeile `Aheenam\Test\TestServiceProvider::class,` als neuen Eintrag in das Providers-Array hinzu.

## 5. Schritt: Controllers & Routes

Nun können wir anfangen unseren ersten Code zu erstellen. Unse triviales "Hello World"-Programm soll nichts anderes machen als beim Aufruf einer bestimmten Route einfach den Namen, der in der Route enthalten ist zu begrüßen.

Das brauchen wir als erstes die Route. Dafür erstellen wir uns zuerst eine **routes.php** im `src/` Ordner des Pakets. Dies funktioniert nun so wie du es bereits von einer normalen Laravel Applikation kennst:

```php
<?php

Route::get('/test/{name}',
    'Aheenam\Test\Controllers\TestController@index');
```

Mit einem GET-Request auf diese Route können wir also nun einen Namen festlegen, welchen wir dann später für die Ausgabe benutzen können. Diese Route führt zum TestController, in welcher dann die Methode index() aufgerufen werden soll. Erstellen wir diesen also auch. Wir erstellen also einen  Ordner `Controllers/` innerhalb des `src/` Ordners und erstellen darin unseren Controller. Natürlich könntest du den Ordner auch weglassen und direkt in src/ den TestController erstellen, aber bei einem größeren Projekt könnte das sehr schnell unübersichtlich werden. Aus diesem Grund fangen wir schon direkt am Anfang an sauber zu sortieren. Der TestController sieht dann so aus:

```php
<?php

namespace Aheenam\Test\Controllers;

use App\Http\Controllers\Controller;

class TestController extends Controller
{

    /**
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($name)
    {
        return view('test::index', [
            'name' => $name
        ]);
    }

}
```

### Routen und Controller registrieren

Als nächstes werden wir Laravel mitteilen, dass es auch unsere neuen Routen und Controller aus dem Package verwenden soll. Hier kommt nun unser generierter Service Provider ins Spiel. Diesen haben wir bereits in einem der vorigen Schritte mit der App verknüpft. Nun öffnen wir mal diese Datei und sehen dort zwei Funktionen `boot()` und `register()`.

Mit der `boot` Methode kannst du nun unsere Routen und Controller. Das geschieht wie in den folgenden Zeilen:

```php
/**
 * Bootstrap the application services.
 *
 * @return void
 */
public function boot()
{
    include __DIR__.'/routes.php';
    $this->app->make('Aheenam\Test\Controllers\TestController');
}
```

## 6. Schritt: Die View

Nun können wir also die Route aufrufen und das, was im Controller steht wird nun auch ausgeführt. Was steht in diesem? Wir übergeben die Variable `$name` aus der Route direkt an die View weiter. Diese heißt in diesem Fall **test::index**. Wir sehen hier, dass die View einen Präfix index:: hat. Dies signalisiert, dass nicht im normalen View-Fenster geschaut werden soll, sondern in den View-Ordner, der über einen Service Provider definiert wurde. Diese Definition haben wir noch nicht gemacht. Holen wir dies also nach.

Erstellen wir erst einmal einen Ordner innerhalb unseres `src/` mit dem Namen `views/` und befüllen diese direkt mit der **index.blade.php**, die wir später benutzen werden. Als nächstes wechseln wir wieder zu unserem Service Provider. Dort legen wir in der `boot` Methode fest, von welchem Ordner die Views geladen werden sollen.

Während die register nur dazu benutzt wird, die Elemente zu registrieren, die benötigt wird, ist die boot die Funktion, die nach dem Laden aller Service Provider geladen wird und so Zugriff auf alle Funktionen hat. Die register sieht bei uns folgendermaßen aus:

```php
/**
 * Register the application services.
 *
 * @return void
 */
public function register()
{
    $this->loadViewsFrom(__DIR__.'/views', 'test');

    $this->publishes([
        __DIR__.'/views' => base_path('resources/views/aheenam/test'),
    ]);

}
```

In der ersten Zeile legen wir fest, dass der Ordner `views/` für die Views zuständig sind. Wir definieren im zweiten Parameter auch direkt den Namespace dafür, welchen wir bereit vorher als Präfix beim Laden der View benutzt haben.

### Veröffentlichen der Views

In den darauffolgenden Zeilen legen wir fest, wohin die Views kopiert werden sollen, wenn der Benutzer die Views veröffentlicht. Was heißt das?

Stell dir vor, du hast dein Package veröffentlicht und ein anderer Benutzer hat dieses im Einsatz. Er will aber Änderungen an dieser View machen und führt diese direkt im `views/` Verzeichnis des Pakets durch. Was passiert, wenn du dann ein Update zur Verfügung stellst und er ein Update durchführt? Genau, seine Änderungen sind alle weg. Um das zu vermeiden, gibt es die Möglichkeit zu publishen. Dabei wird einfach eine Kopie der Elemente an einer bestimmten Stelle erstellt, wo dann der User seine Änderungen durchführen kann.

Laravel schaut dann beim Laden der Views auf diese geänderten Dateien statt in den Hauptdateien des Pakets. Das macht diese Funktion. Wir können nicht nur Views kopieren, sondern auch Konfigurationsdateien oder sogar Datenbank-Migrations.

## Weiterführende Informationen

Mit diesen einfachen 6 Schritten hast du dein erstes Paket erstellt. Natürlich gibt es noch mehr, aber für den Einstieg ist das denke ich mal genug. Den Rest erlernst du ganz einfach, indem du an einem praxisnahen Anwendungsfall dein eigenes Paket erstellst.

Du kannst dann, wenn du fertig bist, natürlich dein Paket über [packagist](https://packagist.org/) anderen zur Verfügung stellen. Wie das funktioniert, werde ich dir vielleicht in einem weiteren Beitrag erläutern.

Wenn du Details über den Service Provider erfahren willst, dann ist die Laravel Dokumentation eine gute Anlaufstelle. Wenn du Fragen hast, dann stell sie mir in den Kommentaren.