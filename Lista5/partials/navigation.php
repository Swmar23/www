<nav id="myTopnav"> 
    <span id="mySpan" onclick="openNav()">   &#9776;  </span> 
    <div class="dropdown">
      <input type="checkbox" id="my-dropdown" value="" name="my-checkbox">
      <label for="my-dropdown"
         data-toggle="dropdown">
      Menu
      </label>
      <ul>
        <li><a href="aboutme.php">O mnie</a></li>
        <li><a href="education.php">Wykształcenie</a></li>
        <li><a href="projects.php">Projekty</a></li>
        <li><a href="interests.php">Zainteresowania</a></li>
        <li><a href="contact.php">Kontakt</a></li>
      </ul>
    </div>
    <span class="desktopSpan"> <a href="aboutme.php">O mnie</a></span>
    <span class="desktopSpan"> <a href="education.php">Wykształcenie</a></span>
    <span class="desktopSpan"> <a href="projects.php">Projekty</a></span>
    <span class="desktopSpan"> <a href="interests.php">Zainteresowania</a></span>
    <span class="desktopSpan"> <a href="contact.php">Kontakt</a></span>
    <span id="toIndex">
      <a href="index.php">Marek Świergoń</a> 
    </span>
    <a href="https://www.github.com/Swmar23"> 
      <picture id="githublogo">
        <source srcset="images/github-logo.png" media="(min-width: 750px)">
        <source srcset="images/github-mark.png">
        <img src="images/github-mark.png" alt="Flowers">
      </picture>  
    </a>
</nav>

  <nav id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="aboutme.php">O mnie</a>
    <a href="education.php">Wykształcenie</a>
    <a href="projects.php">Projekty</a>
    <a href="interests.php">Zainteresowania</a>
    <a href="contact.php">Kontakt</a>
</nav>
<script src="../sideNav.js"></script>