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
  <title>Wykształcenie</title>
</head>

<body id="myBody">

<?php include_once('./partials/navigation.php') ?>\

<main>
  <article>
    <h3>Wykształcenie</h3>
    <section class="contact">
      <h4>Co studiuję i w czym piszę?</h4>
      <p>Studiuję informatykę algorytmiczną na Politechnice Wrocławskiej. Obecnie jestem na 1 semestrze studiów II stopnia.</p>

      <h5 id="logos-header">Języki, w których najwięcej programowałem:</h5>
      <div id="lang1" class="programming-logos"></div>
      <noscript>
        <div id="lang1-noscript" class="programming-logos">
          <img src="programming_logos/java.png" alt="Java logo">
          <img src="programming_logos/julia.png" alt="Julia logo">
          <img src="programming_logos/c++.png" alt="C++ logo">
          <img src="programming_logos/python.png" alt="Java logo">
          <img src="programming_logos/mysql.png" alt="MySQL logo">
        </div>
      </noscript>

      <h5 id="logos-header">Pozostałe języki, w których miałem okazję pisać (na poziomie podstawowym): </h5>
      <div id="lang2" class="programming-logos"></div>
      <noscript>
        <div id="lang2-noscript" class="programming-logos">
          <img src="programming_logos/c.png" alt="C logo">
          <img src="programming_logos/html5.png" alt="HTML5 logo">
          <img src="programming_logos/css.png" alt="CSS logo">
          <img src="programming_logos/sass.png" alt="SASS logo">
          <img src="programming_logos/javascript.png" alt="JavaScript logo">
          <img src="programming_logos/swipl.png" alt="Prolog (swipl) logo">
          <img src="programming_logos/haskell.png" alt="Haskell logo">
          <img src="programming_logos/kotlin.png" alt="Kotlin logo">
        </div>
      </noscript>

      <h5 id="logos-header">Ponadto potrafię korzystać z podstawowych funkcjonalności systemów kontroli wersji: </h5>
      <div id="lang3" class="programming-logos"></div>
      <noscript>
        <div id="lang3-noscript" class="programming-logos">
          <img src="programming_logos/svn.png" alt="Subversion logo">
          <img src="programming_logos/git.png" alt="Git logo">
        </div>
      </noscript>
    </section>
    <section class="contact">
        <h4 id="repozytoria-z-moim-wkładem-w-ramach-studiów">Repozytoria z moim
        wkładem w ramach studiów</h4>
        <div style="overflow-x:auto;">
        <table style="width:100%;">
        <colgroup>
        <col style="width: 16%">
        <col style="width: 16%">
        <col style="width: 16%">
        <col style="width: 16%">
        <col style="width: 16%">
        <col style="width: 16%">
        </colgroup>
        <thead>
        <tr class="header">
        <th>Semestr</th>
        <th>Przedmiot</th>
        <th>Prowadzący</th>
        <th>Ocena końcowa</th>
        <th>Język programowania, narzędzia</th>
        <th>Link do repozytorium</th>
        </tr>
        </thead>
        <tbody>
        <tr class="odd">
        <td>6</td>
        <td>Algorytmy Optymalizacji Dyskretnej</td>
        <td>dr inż. Karol Gotfryd</td>
        <td>???</td>
        <td>Julia (JUMP, HiGHS)</td>
        <td><a href="https://github.com/Swmar23/AOD">AOD</a></td>
        </tr>
        <tr class="even">
        <td>6</td>
        <td>Aplikacje Mobilne</td>
        <td>dr inż. Marcin Zawada</td>
        <td>???</td>
        <td>Kotlin (Android Studio), ???</td>
        <td>zostanie opublikowane po zakończeniu kursu</td>
        </tr>
        <tr class="odd">
        <td>6</td>
        <td>Nowoczesne technologie WWW</td>
        <td>dr inż. Anna Lauks-Dutka</td>
        <td>???</td>
        <td>HTML5, CSS, JavaScript, SASS</td>
        <td><a href="https://github.com/Swmar23/www">www</a>,<a href="puzzle.html">Sliding Puzzle Game</a></td>
        </tr>
        <tr class="even">
        <td>6</td>
        <td>Wprowadzenie do Sztucznej Inteligencji</td>
        <td>dr Maciej Gębala</td>
        <td>???</td>
        <td>???</td>
        <td>zostanie opublikowane po zakończeniu kursu</td>
        </tr>
        <tr class="odd">
        <td>5</td>
        <td>Języki Formalne i Techniki Translacji</td>
        <td>dr Maciej Gębala</td>
        <td>4.0</td>
        <td>Python3, SLY</td>
        <td><a
        href="https://github.com/Swmar23/JFTT_Kompilator">JFTT_Kompilator</a>
        (30 miejsce na 66 zgłoszonych kompilatorów)</td>
        </tr>
        <tr class="even">
        <td>5</td>
        <td>Obliczenia Naukowe</td>
        <td>prof. dr hab. Paweł Zieliński</td>
        <td>5.5</td>
        <td>Julia</td>
        <td><a
        href="https://github.com/Swmar23/obliczenia-naukowe">obliczenia-naukowe</a>
        (metody numeryczne)</td>
        </tr>
        <tr class="odd">
        <td>5</td>
        <td>Programowanie Funkcyjne</td>
        <td>prof. dr. hab. Jacek Cichoń</td>
        <td>4.0</td>
        <td>Haskell (GHC, GHCi)</td>
        <td>(TODO)</td>
        </tr>
        <tr class="even">
        <td>5</td>
        <td>Programowanie Zespołowe</td>
        <td>dr inż. Przemysław Błaśkiewicz</td>
        <td>4.5</td>
        <td>Java</td>
        <td><a
        href="https://github.com/progzesp22/frontend">progzesp22/frontend</a>
        (zespół Frontend)</td>
        </tr>
        <tr class="odd">
        <td>5</td>
        <td>Środowisko Programisty</td>
        <td>dr Marcin Kik</td>
        <td>5.5</td>
        <td>Shell, SVN, Git</td>
        <td><a
        href="https://github.com/Swmar23/srodowisko-programisty">srodowisko-programisty</a></td>
        </tr>
        <tr class="even">
        <td>4</td>
        <td>Algorytmy i Struktury Danych</td>
        <td>dr inż. Zbigniew Gołębiewski</td>
        <td>4.5</td>
        <td>C/C++</td>
        <td><a href="https://github.com/Swmar23/AiSD">AiSD</a></td>
        </tr>
        <tr class="odd">
        <td>4</td>
        <td>Algorytmy Metaheurystyczne</td>
        <td>prof. dr hab. Wojciech Bożejko</td>
        <td>5.0</td>
        <td>Java</td>
        <td><a
        href="https://github.com/Dybol/AlgorytmyMeta">Dybol/AlgorytmyMeta</a></td>
        </tr>
        <tr class="even">
        <td>4</td>
        <td>Kodowanie i Kompresja Danych</td>
        <td>dr Maciej Gębala</td>
        <td>5.0</td>
        <td>C++ (z zewnętrzną biblioteką)</td>
        <td><a href="https://github.com/Swmar23/KiKD">KiKD</a> (TODO)</td>
        </tr>
        <tr class="odd">
        <td>4</td>
        <td>Programowanie w Logice</td>
        <td>dr Przemysław Kobylański</td>
        <td>5.0</td>
        <td>Prolog - SWIPL</td>
        <td><a
        href="https://github.com/Swmar23/programowanie-w-logice">programowanie-w-logice</a>
        (TODO)</td>
        </tr>
        <tr class="even">
        <td>4</td>
        <td>Technologie Sieciowe</td>
        <td>dr hab. inż. Łukasz Krzywiecki</td>
        <td>5.0</td>
        <td>GNS3, Java, podstawowe narzędzia sieciowe w Ubuntu</td>
        <td><a
        href="https://github.com/Swmar23/technologie-sieciowe">technologie-sieciowe</a>
        (TODO)</td>
        </tr>
        <tr class="odd">
        <td>3</td>
        <td>Technologie Programowania</td>
        <td>dr inż. Wojciech Macyna</td>
        <td>5.0</td>
        <td>Java</td>
        <td><a
        href="https://github.com/Krrer-uni/ChineseCheckers">Krrer-uni/ChineseCheckers</a></td>
        </tr>
        <tr class="even">
        <td>3</td>
        <td>Bazy Danych i Systemy Informacji</td>
        <td>dr inż. Anna Lauks-Dutka</td>
        <td>5.5</td>
        <td>SQL (MySQL)</td>
        <td><a href="https://github.com/Swmar23/sql">sql</a></td>
        </tr>
        <tr class="odd">
        <td>3</td>
        <td>Architektura Komputerów i Systemy Operacyjne</td>
        <td>dr inż. Marcin Zawada</td>
        <td>5.0</td>
        <td>Bash, NASM (assembly), C</td>
        <td>(TODO)</td>
        </tr>
        <tr class="even">
        <td>2</td>
        <td>Kurs Programowania</td>
        <td>dr inż. Wojciech Macyna</td>
        <td>5.0</td>
        <td>Java, C++</td>
        <td>(TODO)</td>
        </tr>
        <tr class="odd">
        <td>1</td>
        <td>Wstęp do Informatyki i Programowania</td>
        <td>dr Przemysław Kobylański</td>
        <td>5.0</td>
        <td>C</td>
        <td>(TODO)</td>
        </tr>
        </tbody>
        </table>
      </div>
    </section>
  </article>
</main>

<?php include_once('./partials/footer.php') ?>

<script src="promisesImages.js"></script>
</body>
</html> 
