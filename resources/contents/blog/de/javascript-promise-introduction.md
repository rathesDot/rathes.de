---
id: 1822
title: Einführung in JavaScript Promise
date: 2017-05-25T14:30:12+00:00
author: Rathes Sachchithananthan
image: /images/blog/javascript-promise.png
categories:
  - Web
tags:
  - Frontendentwicklung
  - JavaScript
template: post
---

Promises in JavaScript sind ein mächtiges Feature, dass die Arbeit mit asynchronem Code sehr vereinfacht. Ich möchte dich in diesem Beitrag in die Welt der Promises einführen.

<!--more-->

Gerade wenn du dich im Bereich der Web-App Entwicklung herumtreibst, wirst du im das Thema asynchrone Requests nicht herumkommen. Denn du wirst in der Regel sehr viele Anfragen an eine API machen, die nicht synchron laufen werden. Wenn du zum Beispiel das Package Axios einsetzt (welche ich in meinem Beitrag zur Einführung in Vuex bereits erwähnt habe), dann wirst du sehr oft Code wie Folgenden gemacht haben.

<pre><code class='js-code language-javascript'>axios.get('https://domain.tld/api/xyz')
  .then((response) =&gt; {
    console.log(response)
  })
  .catch((error) =&gt; {
    console.log(error)
  })</code></pre>

Das ist ein sehr gutes Beispiel für einen Promise im Einsatz. Du führst eine asynchrone Anfrage durch und wartest auf ein Resultat. Und sobald das Resultat da ist, kannst du je nach Erfolg oder Misserfolg mit diesem Resultat weiterarbeiten.

## Warum das Ganze?

Aber fangen wir lieber ganz von vorne an. Die erste Frage, die beantwortet werden muss, ist die nach dem Sinn. JavaScript ist bekannterweise single-threaded, das heißt es können nicht mehrere Skripte parallel, sondern immer nur sequentiell hintereinander ausgeführt werden.

Während synchroner, sequentiell ausgeführter Code sehr einfach zu verfolgen ist, sind wir bei asynchronem Code in der Regel viel flexibler und performanter. Wir müssen nicht die ganze Zeit warten bis eine einfache (API-)Anfrage durchgelaufen ist und dann erst den Rest der Webseite aufbauen (und so den Benutzer verärgern und gar verlieren), sondern können mehrere Aufrufe auf einmal anwerfen und diese einzeln abarbeiten sobald diese fertig sind. Wie bereits am Anfang erwähnt ist das Thema gerade beim Thema Web-Apps sehr interessant.

## Begriffe beim Thema Promise

Du wirst auf einige Begriffe stoßen, wenn du dich mit dem Thema befasst und dich auch auf anderen Webseiten einliest. Diese sind zwar nicht komplex, aber man kann schnell mal welche durcheinander bringen.

Ein Promise kann die folgenden einen der folgenden drei Zustände haben:

  * pending: Der ursprüngliche Status, weder ausgeführt noch abgebrochen
  * fulfilled: Die Operation wurde erfolgreich ausgeführt
  * rejected: Operation fehlgeschlagen

Außerdem wirst du auf die zwei Begriffe resolve und reject stoßen, welche ich dir in weiteren Verlauf näher erläutern werde.

## Simpler Einsatz von Promises

Ein einfacher Promise sieht wie folgt aus:

<pre><code class='js-code language-javascript'>function myAsyncRequest (uri) {
  return new Promise((resolve, reject) =&gt; {
    
    let image = new Image();
    
    image.onload = function () {
      resolve(image);
    }

    image.onerror = function () {
      reject(new Error('Could not load image with URI ' + uri));
    }

    image.src = uri;    
  });
}

myAsyncRequest("https://this.is.my/uri/to/my/image.jpg")
  .then((image) =&gt; {
    console.log(image);
  })
  .catch((error) =&gt; {
    console.log(error);
  })</code></pre>

Einen Promise erzeugst du mit dem Konstruktor <code class='js-code language-javascript'>new Promise()</code> der wiederum eine Funktion als Parameter beinhaltet. Diese Funktion hat die Variablen resolve und reject (die beiden Begriffe, die ich bereits oben erwähnt habe). Diese beiden Funktionen werden im Code auch ausgeführt. Die Funktion &#8222;resolve&#8220; wird immer dann benutzt, wenn die Aktion als erfolgreich deklariert werden soll, &#8222;reject&#8220; markiert, dass etwas nicht erfolgreich war.

An diesen Promise kann man nun die Funktionen <code class='js-code language-javascript'>.then()</code> und <code class='js-code language-javascript'>.catch()</code> anhängen und so die beiden Fälle abfangen. Ganz einfach oder?

## Promise Chaining

Die <code class='js-code language-javascript'>.then()</code> Funktion eines Promises liefert immer wieder einen weiteren Promise aus, sodass wir weitere <code class='js-code language-javascript'>.then()</code> Funktionen an diesen Promise anhängen können.

<pre><code class='js-code language-javascript'>myAsyncRequest("https://this.is.my/uri/to/my/image.jpg")
  .then((image) =&gt; {
    console.log(image);
    return { src: image.src, width: image.width, height: image.height }
  })
  .then((data) =&gt; {
    console.log(data.height);
    console.log(data.width);
    console.log(data.src);
  })
  .catch((error) =&gt; {
    console.log(error);
  })</code></pre>

Die erste Funktion liefert ein Objekt zurück, das die Daten des Bildes beinhaltet. Dieses können wir ganz einfach in einem weiteren <code class='js-code language-javascript'>.then()</code> abgreifen und weiterverarbeiten.

## Promise auflösen

Anders als oben gezeigt, muss das catch nicht unbedingt am Ende dieser Kette stehen. Stellen wir uns bei diesem Beispiel vor, dass wir ein &#8222;Dummy-Bild&#8220; anzeigen wollen, wenn das Bild nicht geladen werden konnte. Das würde dann wie folgt aussehen:

<pre><code class='js-code language-javascript'>myAsyncRequest("https://this.is.my/uri/to/my/image.jpg")
  .catch((error) =&gt; {
    console.log(error);
    let notFoundImage = new Image()
    notFoundImage.src = "./some/path/dummy.png"
    return notFoundImage
  })
  .then((image) =&gt; {
    console.log(image);
    return { src: image.src, width: image.width, height: image.height }
  })
  .then((data) =&gt; {
    console.log(data.height);
    console.log(data.width);
    console.log(data.src);
  })</code></pre>

Man kann sogar einen weiteren Promise in dem auflösenden <code class='js-code language-javascript'>.then()</code> zurückgeben, welcher dann vor dem nächsten <code class='js-code language-javascript'>.then()</code> ausgeführt wird.

<pre><code class='js-code language-javascript'>myAsyncRequest("https://this.is.my/uri/to/my/image.jpg")
  .catch((error) =&gt; {
    console.log(error);
    return myAsyncRequest("./some/path/dummy.png")
  })
  .then((image) =&gt; {
    console.log(image);
    return { src: image.src, width: image.width, height: image.height }
  })
  .then((data) =&gt; {
    console.log(data.height);
    console.log(data.width);
    console.log(data.src);
  })</code></pre>

## Promise.all()

Bisher hast du immer nur ein Bild asynchron geladen. Was aber, wenn du mehr als nur eines laden willst? Und erst dann eine Aktion ausführen willst, wenn alle Bilder geladen wurden?

Der erste Gedanke wäre eine sehr lange Kette und am Ende dieser Kette im letzten <code class='js-code language-javascript'>.then()</code> dann die Aktion. Es geht aber definitiv einfacher:

<pre><code class='js-code language-javascript'>var urls = ['https://my.tld/one.jpg', 'https://my.tld/two.png', 'https://my.tld/three.png'];
let promises = urls.map(myAsyncRequest);

Promise.all(promises)
 .then(function(images) {
 console.log('All images loaded', images);
 })
 .catch(function(err) {
 console.error(err);
 });</code></pre>

Wenn man <code class='js-code language-javascript'>Promise.all()</code> einen Array an Promises übergeben, wartet dieser ab, bis alle geladen werden und geht dann erst in die nächste <code class='js-code language-javascript'>.then()</code> Funktion.

* * *

Wie du siehst sind Promises gar nicht so schwer zu verstehen und trotzdem sehr hilfreich. Promises sind seit ES2015 Standard und <a href="https://caniuse.com/#feat=promises" target="_blank" rel="noopener noreferrer">werden auch von allen aktuellen Browsern unterstützt</a>. (Der IE11 ist kein aktueller Browser mehr).

Die Promises selbst haben bereits eine Erweiterung erfahren. Mit <a href="https://developers.google.com/web/fundamentals/getting-started/primers/async-functions" target="_blank" rel="noopener noreferrer">Async/Await</a> werden sogar die .then() überflüssig gemacht bzw. vereinfacht, aber das ist dann wohl Stoff für einen weiteren Beitrag.

&nbsp;