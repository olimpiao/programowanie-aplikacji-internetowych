<?php
/* Smarty version 5.8.0, created on 2026-03-29 19:51:23
  from 'file:calculator.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_69c9669b563d00_89250166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48d69b8ebdb17711b1f6a0cc963a1b63aa051145' => 
    array (
      0 => 'calculator.tpl',
      1 => 1774806680,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_69c9669b563d00_89250166 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\programowanie_aplikacji_internetowych\\kalkulator_kredytowy_ver_4\\templates';
?>    <?php $_smarty_tpl->renderSubTemplate("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
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
<?php if (!( !$_smarty_tpl->hasVariable('errors') || empty($_smarty_tpl->getValue('errors')))) {
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('errors'), 'error');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('error')->value) {
$foreach0DoElse = false;
?>
                    <div class="box error" style="color:red; font-weight:bold;"><?php echo $_smarty_tpl->getValue('error');?>
</div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php }?>
            <?php if ((true && ($_smarty_tpl->hasVariable('rata') && null !== ($_smarty_tpl->getValue('rata') ?? null)))) {?>
                <div class="box success" style="color:#00ff00; font-weight:bold;">
                    Miesięczna rata będzie wynosić:
                    <?php echo $_smarty_tpl->getValue('rata');?>
 zł
                </div>
            <?php }?>
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
    <?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
