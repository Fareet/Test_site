<?php
$pathFile = basename(__FILE__, '.php');
?>

<div class="clearfix">
    <ul class="main-menu bottom">
        <? (new NavigateMenu)->showMenu($pathFile) ?>
    </ul>
</div>

<div class="footer">&copy;&nbsp;<nobr>2021</nobr> Project.</div>
</body>

</html>