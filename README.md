# www - Nowoczesne Technologie WWW
Zbiorcze repozytorium rozwiązań zadań z przedmiotu Nowoczesne Technologie WWW, rok akademicki 2022/2023. Kurs prowadzony przez dr inż. Annę Lauks-Dutka na kierunku Informatyka Algorytmiczna, Wydział Informatyki i Telekomunikacji Politechniki Wrocławskiej.

### Lista 1 
Zrealizowane poza repozytorium, patrz [strona główna](https://swmar23.github.io).

Napisanie strony własnego portfolio w językach HTML5 i CSS3 (z lekką domieszką JavaScript). Stworzone w myśl zasady *mobile first* (podstawowy wygląd na wersję mobilną, zapytania medialne zmieniające układ dla większych ekranów). Przy tworzeniu wykorzystano flexboxy oraz gridy; użyte zostały również znaczniki nowe dla HTML5 `<nav>`, `<header>`, `<footer>`, `<section>`, `<article>`, `<main>`. Wersja poprawnie waliduje się na walidatorach CSS i HTML5.

### Lista 2
Dla strony z Listy 1, napisać arkusz styli z użyciem SASS (preprocesor CSS). Wykorzystano zagnieżdżenie selektorów, domieszki, importowanie, zmienne, listy, mapy, instrukcje logiczne oraz ostrzeżenia przy kompilacji. Pliki w formacie `.css` skompilowano w dwóch wersjach: klasycznej i deweloperskiej (compressed).

### Lista 3

#### Zadanie 1
Zrealizowane poza repozytorium, patrz [strona główna](https://swmar23.github.io). 
* responsywne menu hamburgerowe w JavaScript,
* galeria zdjęć ładowanych równolegle z wykorzystaniem obietnic,
* alternatywna wersja menu dla przeglądarek nieobsługujących JavaScript (lub mających go wyłączonego).

#### Zadanie 2 i Zadanie 3
Gra – układanka obrazkowa. Napisana wykorzystaniem canvas w JavaScript. Korzysta z localStorage do zapisu stanu gry oraz dostosowuje wielkość do rozmiarów ekranu przy inicjalizacji gry. Dostępna również na mojej [stronie](https://swmar23.github.io/puzzle.html).

### Lista 4
(plus dodatkowe ponadprogramowe elementy, jak OAuth2.0 i Bootstrap)

Aplikacja webowa do pisania prywatnych notatek z wykorzystaniem Node.js, MongoDB, Bootstrap 5, EJS i autoryzacji OAuth2.0 (logowanie poprzez Google). Zawiera interefejs w architekturze REST, który obsługuje żądania i odpowiedzi HTTP. W ramach niego możliwe jest przeglądanie, dodawanie, edytowanie i usuwanie notatek oraz weryfikacja użytkownika (logowanie i wylogowywanie się).

### Lista 5

Wersja archiwalna strony głównej z wykorzystaniem języka skryptowego PHP do zastosowania zasady DRY poprzez dynamiczne ładowanie powtarzających się fragmentów stron (wyodrębniona sekcja nawigacyjna i stopka). 

Prosty licznik odwiedzin (znajdujący się w stopce). Zapisuje unikatowe adresy IP i łączną liczbę odświeżeń strony.
