<!DOCTYPE html>
<html lang="pl">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <link href='http://fonts.googleapis.com/css?family=Black+Ops+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
  <title>Zainteresowania</title>
</head>

<body id="myBody">

<?php include_once('./partials/navigation.php') ?>

<script type="text/javascript" id="MathJax-script" async
  src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
</script>


<main>
  <article>
    <h3>Moje zainteresowania</h3>
    <section class="contact" >
      <img src="images/Groetzsch-graph.png" alt="graf Groetzscha">
      <h4>Teoria Grafów</h4>
      <p>Grafy spotykamy w naszym codziennym życiu na każdym kroku. Sieci połączeń kolejowych, układy scalone, sieci komputerowe, nawigacja a nawet struktury białek w naszym ciele
         - wszystkie te pojęcia mają wspolną składową, mianowicie można je opisać grafami. Wobec tego zgłębianie własności poszczególnych rodzin grafów ma wiele praktycznych zastosowań
        i ułatwia optymalne tworzenie obiektów bazujących na grafach.</p>
      <p>O tym, jak ważne są grafy w informatyce, uświadomiły takie przedmioty jak Wprowadzenie do Teorii Grafów czy Algorytmy Optymalizacji Dyskretnej. Jest to przykład dziedziny,
        która choć na pierwszy rzut oka wydaje się niepraktyczna ze względu na silną matematyczną abstrakcję, to jednak z roku na rok staje się co raz bardziej istotna. Uważam, że kazdy informatyk
        myślący poważnie o pisaniu optymalnego kodu powinien być zaznajomiony z podstawami Teorii Grafów.  
      </p>
    </section>

    <section class="contact" >
      <img src="images/tsp.png" alt="graf Groetzscha">
      <h4>Algorytmy Optymalizacyjne</h4>
      <p>W dzisiejszych czasach wszystkim zależy na wydajności. Pragniemy jak najszybciej dostać się z punktu A do punktu B, fabryki chcą jak najbardziej zminimalizować koszty produkcji, a 
        firmy spedycyjne planują trasy tak, by ich koszt był jak najmniejszy. Z pomocą przychodzą algorytmy znajdujące rozwiązania optymalne (lub sub-optymalne gdy problem jest za trudny).
      </p>
      <p>Dziedzina algorytmów optymalizacyjnych jest bardzo szeroka. Zaliczyć do niej można m.in. algorytmy programowania liniowego, heurystyki i metaheurystyki (przydatne dla problemów NP-trudnych), programowanie dynamiczne,
        algorytmy aproksymacyjne i wiele, wiele innych kategorii. Przykładowo, na ilustracji obok znajduje się jedno z możliwych rozwiązań problemu komiwojażera. Polega on na tym, że
        chce znaleźć trasę (cykl) łączącą wszystkie punkty, która będzie miała najmniejszą długość. Problem komiwojażera jest problemem NP-trudnym, sprawdzenie wszystkich możliwości dla choćby czterdziestu wierzchołków
        połączonych każdy z każdym daje nam aż 40! &approx; 10<sup>48</sup> potencjalnych tras do sprawdzenia, co rzędowo jest porównywalne z liczbą wszystkich atomów na Ziemi. Widać zatem, że bezmyślne sprawdzanie wszystkiego
        doprowadzi nas do nikąd, potrzeba sprytnych algorytmów korzystających z pewnych heurystyk zmniejszających liczbę przeszukiwanych rozwiązań.
      </p>
      <p>$$a+b=c$$
      </p>
     
    </section>
    <section class="contact">
      <img class="smallImage" src="images/companion-cube.png" style="max-width:150px;" alt="Portal 2 - Companion Cube">
      <h4>A poza studiami?</h4>
      <p>
        Lubię gry komputerowe i książki; gdybym miał wskazać swoje trzy najbardziej ulubione gry, to byłyby to Wiedźmin 3 Dziki Gon (w tym minigrę w gwinta obecną w grze), Minecraft (ze względu na nieograniczone pokłady kreatywności drzemiące w tej grze) oraz Portal 2. 
        Jeśli chodzi o książki to staram się nie ograniczać w jednym gatunku, zdarza mi się czytać fantasy, powieści historyczne, kryminalne czy dokumenty.
      </p>
    </section>
  </article>

</main>

<?php include_once('./partials/footer.php') ?>
   
</body>
</html> 
