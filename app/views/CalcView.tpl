    {include file="header.tpl"}
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
                <form action="{$conf->action_url}calcCompute" method="post">
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
                {if $msgs->isError()}
                    <div class="box error" style="color:red; font-weight:bold;">
                        <ul>
                        {foreach $msgs->getMessages() as $msg}
                            <li>{$msg->text}</li>
                        {/foreach}
                        </ul>
                    </div>
                {/if}
            {if isset($result)}
                <div class="box success" style="color:#00ff00; font-weight:bold;">
                    Miesięczna rata będzie wynosić:
                    {$result} zł
                </div>
            {/if}
            </section>
            <section class="split">
                <section>
                    <img src="{$conf->app_url}/images/micheile-henderson-pLnaCZiwpIk-unsplash.jpg"
                        alt="doniczka z kwiatkiem wypełniona monetami"
                        style="width: 100%; height: auto;">
                </section>
            </section>
        </div>
    </section>
    </div>
    {include file="footer.tpl"}