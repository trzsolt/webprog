    <form action = "?oldal=belep" method = "post">
      <fieldset>
        <legend>Bejelentkezés</legend>
        <br>
        <input type="text" name="felhasznalo" placeholder="Felhasználónév" required><br><br>
        <input type="password" name="jelszo" placeholder="Jelszó" required><br><br>
        <input type="submit" name="belepes" value="Belépés">
        <br>&nbsp;
      </fieldset>
    </form>
    <h3>Regisztrálja magát, ha még nem felhasználó!</h2>
    <form action = "?oldal=regisztral" method = "post">
      <fieldset>
        <legend>Regisztráció</legend>
        <br>
        <input type="text" name="vezeteknev" placeholder="Vezetéknév" required><br><br>
        <input type="text" name="utonev" placeholder="Keresztnév" required><br><br>
        <input type="text" name="felhasznalo" placeholder="Felhasználónév" required><br><br>
        <input type="password" name="jelszo" placeholder="Jelszó" required><br><br>
        <input type="submit" name="regisztracio" value="Regisztráció">
        <br>&nbsp;
      </fieldset>
    </form>
