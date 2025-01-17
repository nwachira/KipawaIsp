<?php
/* Smarty version 4.5.3, created on 2025-01-17 12:29:01
  from '/home/wachira/Kipawa/ui/ui/pagination.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_678a22ddd95500_49393591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6ada9bae77e75d24a4c88ce272da11c189a0f49' => 
    array (
      0 => '/home/wachira/Kipawa/ui/ui/pagination.tpl',
      1 => 1736413615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678a22ddd95500_49393591 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['paginator']->value) {?>
    <center>
    <nav aria-label="Page navigation pagination-sm">
        <ul class="pagination">
            <li <?php if (empty($_smarty_tpl->tpl_vars['paginator']->value['prev'])) {?>class="disabled" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['paginator']->value['url'];
echo $_smarty_tpl->tpl_vars['paginator']->value['prev'];?>
" aria-label="Previous">
                    <span aria-hidden="true"><?php echo Lang::T('Prev');?>
</span>
                </a>
            </li>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['paginator']->value['pages'], 'page');
$_smarty_tpl->tpl_vars['page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->do_else = false;
?>
                <li class="<?php if ($_smarty_tpl->tpl_vars['paginator']->value['page'] == $_smarty_tpl->tpl_vars['page']->value) {?>active<?php } elseif ($_smarty_tpl->tpl_vars['page']->value == '...') {?>disabled<?php }?>"><a
                        href="<?php echo $_smarty_tpl->tpl_vars['paginator']->value['url'];
echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <li <?php if ($_smarty_tpl->tpl_vars['paginator']->value['page'] >= $_smarty_tpl->tpl_vars['paginator']->value['count']) {?>class="disabled" <?php }?>>
                <a href="<?php echo $_smarty_tpl->tpl_vars['paginator']->value['url'];
echo $_smarty_tpl->tpl_vars['paginator']->value['next'];?>
" aria-label="Next">
                    <span aria-hidden="true"><?php echo Lang::T('Next');?>
</span>
                </a>
            </li>
        </ul>
    </nav>
    </center>
<?php }
}
}
