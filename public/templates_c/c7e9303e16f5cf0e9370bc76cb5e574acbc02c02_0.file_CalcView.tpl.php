<?php
/* Smarty version 5.4.5, created on 2026-04-04 20:52:39
  from 'file:CalcView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69d15df7dca331_11835751',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7e9303e16f5cf0e9370bc76cb5e574acbc02c02' => 
    array (
      0 => 'CalcView.tpl',
      1 => 1775328746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_69d15df7dca331_11835751 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\programowanie_aplikacji_internetowych\\amelia\\app\\views';
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
                <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
calcCompute" method="post">
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
                <?php if ($_smarty_tpl->getValue('msgs')->isError()) {?>
                    <div class="box error" style="color:red; font-weight:bold;">
                        <ul>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getMessages(), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
                            <li><?php echo $_smarty_tpl->getValue('msg')->text;?>
</li>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </ul>
                    </div>
                <?php }?>
            <?php if ((true && ($_smarty_tpl->hasVariable('result') && null !== ($_smarty_tpl->getValue('result') ?? null)))) {?>
                <div class="box success" style="color:#00ff00; font-weight:bold;">
                    Miesięczna rata będzie wynosić:
                    <?php echo $_smarty_tpl->getValue('result');?>
 zł
                </div>
            <?php }?>
            </section>
            <section class="split">
                <section>
                    <img src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/images/micheile-henderson-pLnaCZiwpIk-unsplash.jpg"
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
