<div class="w3-bar w3-blue">
  <a href="index.php" class="w3-btn w3-mobile">Einsätze</a>
  <a href="durchsuchung_hinzufuegen.php" class="w3-btn w3-mobile">Durchsuchung hinzufügen</a>
  <a href="notiz_hinzufuegen.php" class="w3-btn w3-mobile">Notiz hinzufügen</a>
  <a href="./login/logout.php" class="w3-btn w3-red w3-mobile w3-right">Logout</a>
  <a href="https://docs.google.com/document/d/1PDALEIoYF1vzbr-zQDbdGMHwFUTBJwqQgN7D1321kEU/edit" rel="noopener" target="_blank" class="w3-btn w3-light-blue w3-mobile w3-right">Handout</a>
</div>

<script type="text/javascript">
  function kennungEinsetzen(elementid) {
    if (localStorage.getItem("kennung") !== null && localStorage.getItem("kennung") != "") {
      console.log("Kennung '" + localStorage.getItem("kennung") + "' eingesetzt.");
      document.getElementById(elementid).value = localStorage.getItem("kennung");

    } else {
      console.log("Keine Kennung vorhanden");
    }
  }
</script>
