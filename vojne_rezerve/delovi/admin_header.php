    <nav>
      <div class="navLeft">
        <a href="../admin/admin_index.php"
          ><img src="../img/grb_vojske_srbije.png" alt=""
        /></a>
      </div>
      <div class="navRight">
        <div class="userPartNav navLinks">
          <a href="../admin/admin_index.php" id="navInd">Početna strana</a>
          <div class="prikaz">
            <p id="navPre" class="prikaz">Pregled vojnih rezervi</p>
            <div class="padajuci nevidljiv" class="meta" id="meta">
              <a href="admin_prikaz.php" id="navPreSvi" class="padajuciEl">Pregled svih rezervista</a>
              <a href="../admin/adimn_prikazKas.php" id="navPreKas" class="padajuciEl">Pregled po kasarnama</a>
            </div>
          </div>
          <a href="../admin/admin_stampa.php" id="navSta">Štampa</a>
          <a href="../admin/admin_oNama.php" id="navOna">O nama</a>
          <button class="loginBtn" onclick= "document.location= '../odjavaData.php'">Odjava</button>
        </div>
        <div class="adminPartNav navLinks">
          <p class="nepromenjeni">Admin deo: </p>
          <a href="../admin/admin_evidencija.php">Evidencija vojnih rezervi</a>
          <a href="../admin/admin_izmenaIBrisanje.php">Izmena podataka</a>
        </div>
      </div>
    </nav>
    <script src="../js/padajuci.js"></script>