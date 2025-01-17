<?php
/* Smarty version 4.5.3, created on 2025-01-17 15:51:35
  from '/home/wachira/Kipawa/ui/ui/customers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_678a5257d846c8_89894422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a90c75171220fad1fea12ac042cceecba849ae82' => 
    array (
      0 => '/home/wachira/Kipawa/ui/ui/customers.tpl',
      1 => 1736413614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:pagination.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_678a5257d846c8_89894422 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        border: 1px solid #ccc;
        background-color: #fff;
        color: #333;
        cursor: pointer;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-hovered mb20 panel-primary">
            <div class="panel-heading">
                <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                    <div class="btn-group pull-right">
                        <a class="btn btn-primary btn-xs" title="save" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/csv&token=<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
"
                            onclick="return ask(this, 'This will export to CSV?')"><span class="glyphicon glyphicon-download"
                                aria-hidden="true"></span> CSV</a>
                    </div>
                <?php }?>
                <?php echo Lang::T('Manage Contact');?>

            </div>
            <div class="panel-body">
                <form id="site-search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers">
                    <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">
                    <div class="md-whiteframe-z1 mb20 text-center" style="padding: 15px">
                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon">Order&nbsp;&nbsp;</span>
                                <div class="row row-no-gutters">
                                    <div class="col-xs-8">
                                        <select class="form-control" id="order" name="order">
                                            <option value="username" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'username') {?>selected<?php }?>>
                                                <?php echo Lang::T('Username');?>
</option>
                                            <option value="fullname" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'fullname') {?>selected<?php }?>>
                                                <?php echo Lang::T('First Name');?>
</option>
                                            <option value="lastname" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'lastname') {?>selected<?php }?>>
                                                <?php echo Lang::T('Last Name');?>
</option>
                                            <option value="created_at" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'created_at') {?>selected<?php }?>>
                                                <?php echo Lang::T('Created Date');?>
</option>
                                            <option value="balance" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'balance') {?>selected<?php }?>>
                                                <?php echo Lang::T('Balance');?>
</option>
                                            <option value="status" <?php if ($_smarty_tpl->tpl_vars['order']->value == 'status') {?>selected<?php }?>>
                                                <?php echo Lang::T('Status');?>
</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <select class="form-control" id="orderby" name="orderby">
                                            <option value="asc" <?php if ($_smarty_tpl->tpl_vars['orderby']->value == 'asc') {?>selected<?php }?>>
                                                <?php echo Lang::T('Ascending');?>
</option>
                                            <option value="desc" <?php if ($_smarty_tpl->tpl_vars['orderby']->value == 'desc') {?>selected<?php }?>>
                                                <?php echo Lang::T('Descending');?>
</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <span class="input-group-addon">Status</span>
                                <select class="form-control" id="filter" name="filter">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['statuses']->value, 'status');
$_smarty_tpl->tpl_vars['status']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->do_else = false;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['filter']->value == $_smarty_tpl->tpl_vars['status']->value) {?>selected<?php }?>><?php echo Lang::T($_smarty_tpl->tpl_vars['status']->value);?>

                                        </option>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="<?php echo Lang::T('Search');?>
..." value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><span
                                            class="fa fa-search"></span> <?php echo Lang::T('Search');?>
</button>
                                    <button class="btn btn-info" type="submit" name="export" value="csv">
                                        <span class="glyphicon glyphicon-download" aria-hidden="true"></span> CSV
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/add" class="btn btn-success text-black btn-block"
                                title="<?php echo Lang::T('Add');?>
">
                                <i class="ion ion-android-add"></i><i class="glyphicon glyphicon-user"></i>
                            </a>
                        </div>
                    </div>
                </form>
                <br>&nbsp;
                <div class="table-responsive table_mobile">
                    <table id="customerTable" class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th><?php echo Lang::T('Username');?>
</th>
                                <th>Photo</th>
                                <th><?php echo Lang::T('Account Type');?>
</th>
                                <th><?php echo Lang::T('Full Name');?>
</th>
                                <th><?php echo Lang::T('Balance');?>
</th>
                                <th><?php echo Lang::T('Contact');?>
</th>
                                <th><?php echo Lang::T('Package');?>
</th>
                                <th><?php echo Lang::T('Service Type');?>
</th>
                                <th>PPPOE</th>
                                <th><?php echo Lang::T('Status');?>
</th>
                                <th><?php echo Lang::T('Created On');?>
</th>
                                <th><?php echo Lang::T('Manage');?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                <tr <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] != 'Active') {?>class="danger" <?php }?>>
                                    <td onclick="window.location.href = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
'"
                                        style="cursor:pointer;"><?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
</td>
                                    <td>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['ds']->value['photo'];?>
" target="photo">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['ds']->value['photo'];?>
.thumb.jpg" width="32" alt="">
                                        </a>
                                    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account_type'];?>
</td>
                                    <td onclick="window.location.href = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
'"
                                        style="cursor: pointer;"><?php echo $_smarty_tpl->tpl_vars['ds']->value['fullname'];?>
</td>
                                    <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['balance']);?>
</td>
                                    <td align="center">
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['phonenumber']) {?>
                                            <a href="tel:<?php echo $_smarty_tpl->tpl_vars['ds']->value['phonenumber'];?>
" class="btn btn-default btn-xs"
                                                title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['phonenumber'];?>
"><i class="glyphicon glyphicon-earphone"></i></a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['email']) {?>
                                            <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>
" class="btn btn-default btn-xs"
                                                title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>
"><i class="glyphicon glyphicon-envelope"></i></a>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['coordinates']) {?>
                                            <a href="https://www.google.com/maps/dir//<?php echo $_smarty_tpl->tpl_vars['ds']->value['coordinates'];?>
/" target="_blank"
                                                class="btn btn-default btn-xs" title="<?php echo $_smarty_tpl->tpl_vars['ds']->value['coordinates'];?>
"><i
                                                    class="glyphicon glyphicon-map-marker"></i></a>
                                        <?php }?>
                                    </td>
                                    <td align="center" api-get-text="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
autoload/plan_is_active/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
">
                                        <span class="label label-default">&bull;</span>
                                    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['service_type'];?>
</td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['ds']->value['pppoe_username'];?>

                                        <?php if (!empty($_smarty_tpl->tpl_vars['ds']->value['pppoe_username']) && !empty($_smarty_tpl->tpl_vars['ds']->value['pppoe_ip'])) {?>:<?php }?>
                                        <?php echo $_smarty_tpl->tpl_vars['ds']->value['pppoe_ip'];?>

                                    </td>
                                    <td><?php echo Lang::T($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</td>
                                    <td><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['created_at']);?>
</td>
                                    <td align="center">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                            style="margin: 0px; color:black"
                                            class="btn btn-success btn-xs">&nbsp;&nbsp;<?php echo Lang::T('View');?>
&nbsp;&nbsp;</a>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
&token=<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                            style="margin: 0px; color:black"
                                            class="btn btn-info btn-xs">&nbsp;&nbsp;<?php echo Lang::T('Edit');?>
&nbsp;&nbsp;</a>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/sync/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
&token=<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                            style="margin: 5px; color:black"
                                            class="btn btn-success btn-xs">&nbsp;&nbsp;<?php echo Lang::T('Sync');?>
&nbsp;&nbsp;</a>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plan/recharge/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
&token=<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
                                            style="margin: 0px;" class="btn btn-primary btn-xs"><?php echo Lang::T('Recharge');?>
</a>
                                    </td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
                <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
