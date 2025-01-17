<?php
/* Smarty version 4.5.3, created on 2025-01-17 12:29:23
  from '/home/wachira/Kipawa/system/paymentgateway/ui/mpesatill.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_678a22f392b8c3_95994337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fdf0b636209ec5d075a8d636dbb2a3cb2d14625b' => 
    array (
      0 => '/home/wachira/Kipawa/system/paymentgateway/ui/mpesatill.tpl',
      1 => 1737104814,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_678a22f392b8c3_95994337 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container-fluid">
<form class="form-horizontal" method="post" role="form" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
paymentgateway/MpesatillStk">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm border-5 mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">M-Pesa Configuration</h4>
                </div>
                <div class="card-body">
                    <!-- Consumer Key -->
                    <div class="form-group row">
                        <label for="mpesa_consumer_key" class="col-md-4 col-form-label">Consumer Key</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="mpesa_consumer_key" name="mpesa_consumer_key" placeholder="xxxxxxxxxxxxxxxxx" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_till_consumer_key'];?>
">
                            <small class="form-text text-muted">
                                <a href="https://developer.safaricom.co.ke/MyApps" target="_blank" class="text-info">https://developer.safaricom.co.ke/MyApps</a>
                            </small>
                        </div>
                    </div>

                    <!-- Consumer Secret -->
                    <div class="form-group row">
                        <label for="mpesa_consumer_secret" class="col-md-4 col-form-label">Consumer Secret</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="mpesa_consumer_secret" name="mpesa_consumer_secret" placeholder="xxxxxxxxxxxxxxxxx" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_till_consumer_secret'];?>
">
                        </div>
                    </div>

                    <!-- Business Shortcode (Store number) -->
                    <div class="form-group row">
                        <label for="mpesa_business_code" class="col-md-4 col-form-label">Business Shortcode (Store number/H.O)</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="mpesa_business_code" name="mpesa_business_code" placeholder="xxxxxxx" maxlength="7" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_till_shortcode_code'];?>
">
                        </div>
                    </div>

                    <!-- Business Shortcode (Till number) -->
                    <div class="form-group row">
                        <label for="mpesa_till" class="col-md-4 col-form-label">Business Shortcode (Till number)</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="mpesa_till" name="mpesa_till" placeholder="xxxxxxx" maxlength="7" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_till_partyb'];?>
">
                        </div>
                    </div>

                    <!-- Pass Key -->
                    <div class="form-group row">
                        <label for="mpesa_pass_key" class="col-md-4 col-form-label">Pass Key</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="mpesa_pass_key" name="mpesa_pass_key" placeholder="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['mpesa_till_pass_key'];?>
">
                        </div>
                    </div>

                    <!-- M-Pesa Environment -->
                    <div class="form-group row">
                        <label for="mpesa_env" class="col-md-4 col-form-label">M-Pesa Environment</label>
                        <div class="col-md-8">
                            <select class="form-control" name="mpesa_env" id="mpesa_env">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['env']->value, 'environment');
$_smarty_tpl->tpl_vars['environment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['environment']->value) {
$_smarty_tpl->tpl_vars['environment']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['environment']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['environment']->value['id'] == $_smarty_tpl->tpl_vars['_c']->value['mpesa_env']) {?>selected<?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['environment']->value['id'];?>
 - <?php echo $_smarty_tpl->tpl_vars['environment']->value['name'];?>

                                    </option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            <small class="form-text text-muted">
                                <span class="text-danger"><b>Sandbox</b></span> is for testing. Switch to <span class="text-success"><b>Live</b></span> for production.
                            </small>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-save"></i> Save Changes
                            </button>
                        </div>
                    </div>

                    <!-- Walled Garden Command -->
                    <div class="mt-4">
                        <pre class="bg-light p-3 border rounded">/ip hotspot walled-garden
add dst-host=safaricom.co.ke
add dst-host=*.safaricom.co.ke
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
