 /*jslint devel: true */

function loadIMG(url, id){
  //await new Promise(r => setTimeout(r, 1500));
  var P = new Promise( function (resolve, reject) {
      var parent = document.getElementById(id);
      var element = document.createElement("img");
      element.setAttribute("src", url);
      element.setAttribute("alt", url);
      parent.appendChild(element);
      element.onload  = function() { resolve(url); };
      element.onerror = function() { reject(url) ; };
    }
  );
  return P;
}

Promise.all([
    loadIMG("programming_logos/java.png","lang1"),
    loadIMG("programming_logos/julia.png","lang1"), 
    loadIMG("programming_logos/c++.png","lang1"), 
    loadIMG("programming_logos/python.png","lang1"), 
    loadIMG("programming_logos/mysql.png","lang1")
  ]).then(function() {
    console.log("Wszystkie loga (lang1) załadowane poprawnie!");
  }).catch(function() {
    console.log("Błąd ładowania galerii rownoległej");
  });


Promise.all([
  loadIMG("programming_logos/c.png","lang2"),
  loadIMG("programming_logos/html5.png","lang2"), 
  loadIMG("programming_logos/css.png","lang2"), 
  loadIMG("programming_logos/sass.png","lang2"), 
  loadIMG("programming_logos/javascript.png","lang2"),  
  loadIMG("programming_logos/swipl.png","lang2"),  
  loadIMG("programming_logos/haskell.png","lang2"),  
  loadIMG("programming_logos/kotlin.png","lang2")  
]).then(function() {
  console.log("Wszystkie loga (lang2) załadowane poprawnie!");
}).catch(function() {
  console.log("Błąd ładowania galerii rownoległej");
});

Promise.all([
  loadIMG("programming_logos/svn.png","lang3"),
  loadIMG("programming_logos/git.png","lang3") 
]).then(function() {
  console.log("Wszystkie loga (lang3) załadowane poprawnie!");
}).catch(function() {
  console.log("Błąd ładowania galerii rownoległej");
});