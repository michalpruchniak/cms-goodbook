<header class="header-book row">
<figure class="cover">
  <?php
  echo '<img src="' .$cover. '" alt="' .$title. '" />';
  ?>
</figure>
<div class="book-details">
  <h2 class="title"> <?php echo $title; ?></h2>
  <table class="table table-hover">
    <tbody>
      <tr>
        <td scope="row">Autor</td>
        <td><?php echo $author; ?></td>
      </tr>
      <tr>
        <td scope="row">Rok wydania</td>
        <td><?php echo $year; ?></td>
      </tr>
      <tr>
        <td scope="row">Wydawnictwo</td>
        <td>Wydawnictwo</td>
      </tr>
      <tr>
        <td scope="row">Ocena:</td>
        <td>
          <?php
            if(isset($stars)){
              echo $stars;
            }
          ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</header>
<div class="row">
  <h3>Opis</h3>
<p>Angielski żeglarz Robert Walton utknął wśród arktycznych lodów. Pewnego dnia do jego statku dociera na saniach wycieńczony rozbitek: szwajcarski przyrodnik Wiktor Frankenstein. Gdy odzyskuje siły, rozpoczyna niesamowitą opowieść o najwspanialszym i najstraszniejszym dziele swego życia: ulepionej w laboratorium ludzkiej istocie, która obróciła się przeciwko niemu…

„Frankenstein” to więcej niż powieść, to nowożytny mit. Zrodził się w okolicznościach, które obrosły legendą: w 1816, słynnym „roku bez lata”, u podnóża szwajcarskich Alp, z gotyckiej zabawy poetów romantycznych, którzy umilali sobie deszczowe wieczory wymyślaniem opowieści niesamowitych. 19-letnia Mary Shelley zamknęła w nim swe refleksje o istocie życia, doświadczenie wczesnego macierzyństwa, fascynację i przerażenie potęgą nauki, senne i nie tylko senne koszmary.

Niniejsze wydanie „Frankensteina” jest wyjątkowe: powieść Mary Shelley po raz pierwszy ukazuje się po polsku w wersji pierwotnej, bez zmian wprowadzonych później przez autorkę.

„Frankensteinowi” po raz pierwszy towarzyszy też całe pokłosie słynnej zabawy literackiej nad Lemanem: nowele „Pogrzeb” George’a Gordona Byrona i „Wampir” Johna W. Polidoriego oraz opowiastki niesamowite Percy’ego Shelleya – wszystkie w nowym, wiernym przekładzie.

Ozdobą tomu są jedne z najpiękniejszych ilustracji, jakich doczekał się „Frankenstein”: ekspresjonistyczne drzeworyty amerykańskiego artysty Lynda Warda.</p>
</div>
