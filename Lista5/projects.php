<!DOCTYPE html>
<html lang="pl">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <link href="themes/prism.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link href='http://fonts.googleapis.com/css?family=Black+Ops+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
  <title>Projekty</title>
</head>

<body id="myBody">

<?php include_once('./partials/navigation.php') ?>

<main>
  <article>
    <h3>Przykładowe projekty zrealizowane przeze mnie</h3>
    <section class="project">
      <h4>Kompilator imperatywnego języka programowania</h4>
      <p>Celem projektu było stworzenie kompilatora tłumaczącego pewien imperatywny język programowania (sztucznie wymyślonego) na język zadanej maszyny wirtualnej. Zadanie to utwierdziło mnie
        w przekonaniu, że przekładanie języków to skomplikowany proces.
      </p>
      <p>Na wstępie należało dokonać analizy leksykalnej, stworzyć leksera, który dokona tokenizacji pliku źródłowego. Następnie tokeny wprowadza się do parsera, który analizuje je w kontekście zadanej w parserze gramatyki.
        To na tym etapie wyświetlane są błędy składniowe. Dla tych dwóch etapów skorzystałem z pakietu SLY dla języka programowania Python. 
      </p>
      <p>
        Ostatecznym i głównym elementem jest sam kompilator tworzący zestaw instrukcji wejściowy dla maszyny wirtualnej. Każdą operację, która wydaje się oczywista i trywialna dla osoby piszącej w wysokopoziomowym języku programowania, trzeba
        przełożyć na podstawowe instrukcje. Lista dostępny instrukcji maszyny wirtualnej była bardzo uboga, nawet mnożenie trzeba było samemu zaprogramować w sposób optymalny!
        Należało także zadbać o poprawne wyłapywanie błędów takich jak redeklaracja zmiennej, użycie niezadeklarowanej zmiennej lub procedury czy też podanie niewystarczającej liczby argumentów w procedurze.
      </p>
      <div class="codeAndCaption">
      <pre><code class="language-python">def __expression_times(self, x, l):
        (value1_data, value2_data) = x
        value1_info = value1_data[1]
        value2_info = value2_data[1]
        value1_codes = value1_data[0]
        value2_codes = value2_data[0]
        codes = []
        if (value2_info == '2'):
          codes += value1_codes
          var_address = self.symbol_table.getVariableAddress(Variable(value1_info, self.current_proc_name), l)
          if not self.symbol_table.isVarInitiated(var_address, l):
            Errors.uninitiated(value1_info, l)
          codes += [Code(f'LOAD {var_address}')]
          codes += [Code(f'ADD {var_address}')]
        elif (value1_info == '2'):
          codes += value2_codes
          var_address = self.symbol_table.getVariableAddress(Variable(value2_info, self.current_proc_name), l)
          if not self.symbol_table.isVarInitiated(var_address, l):
            Errors.uninitiated(value2_info, l)
          codes += [Code(f'LOAD {var_address}')]
          codes += [Code(f'ADD {var_address}')]
        elif (value1_info == '0' or value2_info == '0'):
          codes += [Code(f'SET 0')]
        elif (value2_info == '1'):
          codes += value1_codes
          var_address = self.symbol_table.getVariableAddress(Variable(value1_info, self.current_proc_name), l)
          if not self.symbol_table.isVarInitiated(var_address, l):
            Errors.uninitiated(value1_info, l)
          codes += [Code(f'LOAD {var_address}')]
        elif (value1_info == '1'):
          codes += value2_codes
          var_address = self.symbol_table.getVariableAddress(Variable(value2_info, self.current_proc_name), l)
          if not self.symbol_table.isVarInitiated(var_address, l):
            Errors.uninitiated(value2_info, l)
          codes += [Code(f'LOAD {var_address}')]
        else:
          codes += value1_codes
          codes += value2_codes
          if not (Variable('POM_a', self.current_proc_name) in  self.symbol_table.addresses_main):
            self.symbol_table.addVariable(Variable('POM_a', self.current_proc_name, True), l)
          address_pom_a = self.symbol_table.getVariableAddress(Variable ('POM_a', self.current_proc_name), l)
          if not (Variable('POM_b', self.current_proc_name) in  self.symbol_table.addresses_main):
            self.symbol_table.addVariable(Variable('POM_b', self.current_proc_name, True), l)
          address_pom_b = self.symbol_table.getVariableAddress(Variable ('POM_b', self.current_proc_name), l)
          if not (Variable('POM_res', self.current_proc_name) in  self.symbol_table.addresses_main):
            self.symbol_table.addVariable(Variable('POM_res', self.current_proc_name, True), l)
          address_pom_res = self.symbol_table.getVariableAddress(Variable ('POM_res', self.current_proc_name), l)
          if not (Variable('POM_help', self.current_proc_name) in  self.symbol_table.addresses_main):
            self.symbol_table.addVariable(Variable('POM_help', self.current_proc_name, True), l)
          address_pom_help = self.symbol_table.getVariableAddress(Variable ('POM_help', self.current_proc_name), l)
          address_a = self.symbol_table.getVariableAddress(Variable (value1_info, self.current_proc_name), l)
          address_b = self.symbol_table.getVariableAddress(Variable (value2_info, self.current_proc_name), l)
          codes += [Code(f'LOAD {address_a}')]
          codes += [Code(f'JZERO', 26, self.labeler.new_label('times_JZERO'))]      #wyskocz gdy a = 0!!!
          codes += [Code(f'STORE {address_pom_a}')]
          codes += [Code(f'LOAD {address_b}')]
          codes += [Code(f'JZERO', 23, self.labeler.new_label('times_JZERO'))]      #wyskocz gdy b = 0!!!
          codes += [Code(f'STORE {address_pom_b}')]
          codes += [Code(f'SET 0')]
          codes += [Code(f'STORE {address_pom_res}')] # result = 0
          codes += [Code(f'LOAD {address_pom_b}')] 
          codes += [Code('HALF')]
          codes += [Code(f'STORE {address_pom_help}')]
          codes += [Code(f'ADD {address_pom_help}')]
          codes += [Code(f'STORE {address_pom_help}')]
          codes += [Code(f'LOAD {address_pom_b}')]
          codes += [Code(f'SUB {address_pom_help}')] 
          codes += [Code(f'JZERO', 4, self.labeler.new_label('times_JZERO'))] # sprawdzenie czy b % 2 == 0
          codes += [Code(f'LOAD {address_pom_res}')] # tylko gdy b % 2 != 0
          codes += [Code(f'ADD {address_pom_a}')]
          codes += [Code(f'STORE {address_pom_res}')] # result += pom_a
          codes += [Code(f'LOAD {address_pom_a}')] # to już w obu przypadkach modulo
          codes += [Code(f'ADD {address_pom_a}')] 
          codes += [Code(f'STORE {address_pom_a}')] # pom_a *= 2
          codes += [Code(f'LOAD {address_pom_b}')]
          codes += [Code(f'HALF')]
          codes += [Code(f'STORE {address_pom_b}')] # pom_b /= 2
          codes += [Code(f'JPOS', -16, self.labeler.new_label('times_JPOS'))]   # gdy pom_b > 0  to powtarzamy procedure
          codes += [Code(f'LOAD {address_pom_res}')] # gdy pom_b = 0 to wczytujemy wynik
        return codes, value2_info</code></pre>
        <p><i>Metoda obrazująca przekład mnożenia na język maszynowy.</i></p>
      </div>
    </section>




    <section class="project">
      <h4>Badanie i implementacja algorytmów metaheurystycznych dla TSP</h4>
      <p>W parze z&nbsp;Mikołajem Dyblikiem, w ramach przedmiotu algorytmy metaheurystyczne, zajmowałem się optymalizacją wyznaczania możliwie jak najkrótszych tras 
        dla problemu komiwojażera (Travelling Salesman Problem). </p>
      <p>Problem komiwojażera jest problemem NP-trudnym, nie istnieje metoda rozwiązująca ten problem za każdym razem w czasie wielomianowym. W związku z&nbsp;tym,
        wartościowe jest korzystanie z&nbsp;heurystyk i metaheurystyk, które pozwolą na uzyskanie w sensownym czasie jakościowego rozwiązania. </p>
      <p>Zaczęliśmy od podstawowych heurystyk, takich jak np. zachłanna heurystyka najbliższego sąsiada. Następnie, zaimplementowaliśmy algorytm Tabu Search dla rożnych
        rodzajów sąsiedztw (w tym wariant algorytmu korzystający na zmianę z&nbsp;kilku sąsiedztw, dający średnio w testach najlepsze wyniki). Ostatecznie, projekt sfinalizowany został
        algorytmem genetycznym, gdzie osobniki (tutaj ścieżki zgodne z&nbsp;problemem) walczą o przetrwanie i&nbsp;krzyżują się w celu uzyskania najlepszego rozwiązania.
      </p>

      <div class="codeAndCaption">
        <pre><code class="language-java">
public Integer[] findSolution() {
  timeWhenStarted = System.currentTimeMillis();
  generationNo = 0;
  listToShuffle = initList(problemSize);
  population = generateStartingPopulationWithTournament((int) Math.sqrt(populationSize));
  Integer[] bestSolution = population.get(0).clone();
  double smallestValue = graph.pathLength(population.get(0));
  do {
    generationNo++;
    List&lt;Pair&lt;Integer[], Integer[]>> parents = generateParentsWithRoulette();
    List&lt;Integer[]> children = new ArrayList&lt;>();
    if (typeOfCrossoverOperator == 1) {
      children = crossoverPMX(parents);
    }
    population.addAll(children);
    List&lt;Integer[]> mutatedPopulation = mutate(population);
    List&lt;Integer[]> memedPopulation = memeticAlgorithm(mutatedPopulation);
    List&lt;Pair&lt;Integer[], Double>> survivorsWithValues = selectToSurviveWithValue(memedPopulation);
    Pair&lt;Integer[], Double> bestSolutionWithValue = getTheBestOne(survivorsWithValues);
    if (bestSolutionWithValue.getSecond() &lt; smallestValue) {
      bestSolution = bestSolutionWithValue.getFirst().clone();
      smallestValue = graph.pathLength(bestSolution);
      double averageValueOfPopulation = getAverageValue(survivorsWithValues);
    }
    
    population = getSurvivors(survivorsWithValues);
    
  }
  while (!stopCriterion(System.currentTimeMillis()));
  return bestSolution;
}</code></pre>

        <p><i>Fragment kodu algorytmu genetycznego zaimplementowanego w języku Java.</i></p>
      </div>

    </section>



    <!-- <section class="project">
      <h4>Kodowanie i kompresja danych - kompresja zdjęć TGA</h4>
      <p>Tutaj napiszę więcej info o nim, ale na razie nie.</p>
      <pre><code>kod tu bedzie</code></pre>
    </section> -->
    <section class="project projectWithImages">
      <h4>Chińskie warcaby - aplikacja okienkowa w języku Java</h4>
      <div id="textBlock">
      <p>Razem z Wojciechem Rymerem napisaliśmy aplikcję do gry w chińskie warcaby. Wykorzystaliśmy do tego Javę z Mavenem, narzędziem bazującym na koncepcie Project Object Model.
        W implementacji pomocne były wzorce projektowe takie jak Builder, Mediator, Factory czy State.
      </p>
      <p> Aplikacja działa na podstawowym połączeniu Socket dostępnym w bazowych bibliotekach Javy. Największym wyzwaniem, poza samym projektowaniem klas i stosowaniem wzorców, było
        stworzenie algorytmu walidującego poprawność ruchu. Ponieważ w warcabach możliwe jest wielokrotne bicie, musiał on być rekursywny, ale w taki sposób, żeby się nie zapętlił, co wymagało przechowywania swego rodzaju listy ruchów zakazanych, bo już wykonanych.
      </p>
      </div>
      <img src="images/warcaby.png" alt="Wygląd aplikacji do gry w chińskie warcaby">
    </section>

  </article>
</main>

<?php include_once('./partials/footer.php') ?>

<script src="themes/prism.js"></script>
   
</body>
</html> 
