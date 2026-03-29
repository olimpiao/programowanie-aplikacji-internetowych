    <?php include "header.php"; ?>
    <!-- Two -->
    <section id="two">
        <div class="inner">
            <header class="major">
                <h2 id="kalkulator">Kalkulator kredytowy</h2>
            </header>
        </div>
    </section>
    <!-- Main -->
    <section id="contact">
        <div class="inner">
            <section>
                <form action="calculator.php" method="post">
                    <div class="fields">
                        <div class="field">
                            <label for="kwota">Kwota kredytu w zł:</label>
                            <input type="text" id="kwota" name="kwotaKredytu"
                                placeholder="Wpisz kwotę kredytu" required />
                        </div>
                        <div class="field">
                            <label for="lata">Czas trwania kredytu:</label>
                            <input type="text" id="lata" name="czasTrwania"
                                placeholder="Wpisz czas trwania kredytu" required />
                        </div>
                        <div class="field">
                            <label for="oprocentowanie">Oprocentowanie:</label>
                            <input type="text" id="oprocentowanie" name="oprocentowanieRoczne"
                                placeholder="Wpisz oprocentowanie" required />
                        </div>
                    </div>
                    <ul class="actions">
                        <li><input type="submit" value="Oblicz miesięczną ratę" class="primary" /></li>
                    </ul>
                </form>
                <?php
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo "<div>$error</div>";
                    }
                }

                if (isset($rataMiesieczna)) {
                    echo "<div>Miesięczna rata będzie wynosić: <strong>"
                        . number_format((float)$rataMiesieczna, 2, ',', ' ') . "</strong> zł </div>";
                }
                ?>
            </section>
            <section class="split">
                <section>
                    <img src="images/micheile-henderson-pLnaCZiwpIk-unsplash.jpg"
                        alt="doniczka z kwiatkiem wypełniona monetami"
                        style="width: 100%; height: auto;">
                </section>
            </section>
        </div>
    </section>
    </div>
    <?php include 'footer.php'; ?>