<?php
/* Smarty version 4.5.3, created on 2025-01-17 16:03:37
  from '/home/wachira/Kipawa/ui/ui/customers-view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_678a55296bc733_79279450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1066269a9550ed7ac3e4c470ddb650c7b45c13a7' => 
    array (
      0 => '/home/wachira/Kipawa/ui/ui/customers-view.tpl',
      1 => 1737118988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:pagination.tpl' => 2,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_678a55296bc733_79279450 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid">
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] == 'Active') {?>border-primary<?php } else { ?>border-danger<?php }?>">
                <div class="card-body text-center">
                    <img class="profile-user-img img-fluid rounded-circle mb-3"
                        onclick="window.location.href = '<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['d']->value['photo'];?>
'"
                        src="<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;
echo $_smarty_tpl->tpl_vars['d']->value['photo'];?>
.thumb.jpg"
                        onerror="this.src='<?php echo $_smarty_tpl->tpl_vars['UPLOAD_PATH']->value;?>
/user.default.jpg'" alt="User Avatar">
                    <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['d']->value['fullname'];?>
</h3>
                    <ul class="list-group list-group-flush text-left">
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('Status');?>
</strong> 
                            <span class="badge <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] != 'Active') {?>bg-danger<?php } else { ?>bg-primary<?php }?> float-end"><?php echo Lang::T($_smarty_tpl->tpl_vars['d']->value['status']);?>
</span>
                        </li>
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('Username');?>
</strong> <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
</span>
                        </li>
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('Phone Number');?>
</strong> <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['d']->value['phonenumber'];?>
</span>
                        </li>
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('Email');?>
</strong> <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
</span>
                        </li>
                        <li class="list-group-item"><?php echo Lang::nl2br($_smarty_tpl->tpl_vars['d']->value['address']);?>
</li>
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('City');?>
</strong> <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['d']->value['city'];?>
</span>
                        </li>
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('District');?>
</strong> <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['d']->value['district'];?>
</span>
                        </li>
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('State');?>
</strong> <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['d']->value['state'];?>
</span>
                        </li>
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('Zip');?>
</strong> <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['d']->value['zip'];?>
</span>
                        </li>
                        <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                            <li class="list-group-item">
                                <strong><?php echo Lang::T('Password');?>
</strong>
                                <input type="password" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['password'];?>
" class="form-control-plaintext float-end text-end" 
                                       onmouseleave="this.type = 'password'" onmouseenter="this.type = 'text'" onclick="this.select()">
                            </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['pppoe_username'] != '') {?>
                            <li class="list-group-item">
                                <strong>PPPOE <?php echo Lang::T('Username');?>
</strong> <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['d']->value['pppoe_username'];?>
</span>
                            </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['pppoe_password'] != '' && in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin'))) {?>
                            <li class="list-group-item">
                                <strong>PPPOE <?php echo Lang::T('Password');?>
</strong>
                                <input type="password" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['pppoe_password'];?>
" class="form-control-plaintext float-end text-end" 
                                       onmouseleave="this.type = 'password'" onmouseenter="this.type = 'text'" onclick="this.select()">
                            </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['pppoe_ip'] != '') {?>
                            <li class="list-group-item">
                                <strong>PPPOE Remote IP</strong> <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['d']->value['pppoe_ip'];?>
</span>
                            </li>
                        <?php }?>
                        <!--Customers Attributes view start -->
                        <?php if ($_smarty_tpl->tpl_vars['customFields']->value) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customFields']->value, 'customField');
$_smarty_tpl->tpl_vars['customField']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['customField']->value) {
$_smarty_tpl->tpl_vars['customField']->do_else = false;
?>
                                <li class="list-group-item">
                                    <strong><?php echo $_smarty_tpl->tpl_vars['customField']->value['field_name'];?>
</strong> 
                                    <span class="float-end">
                                        <?php if (strpos($_smarty_tpl->tpl_vars['customField']->value['field_value'],':0') === false) {?>
                                            <?php echo $_smarty_tpl->tpl_vars['customField']->value['field_value'];?>

                                        <?php } else { ?>
                                            <strong><?php echo Lang::T('Paid');?>
</strong>
                                        <?php }?>
                                    </span>
                                </li>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                        <!--Customers Attributes view end -->
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('Service Type');?>
</strong> <span class="float-end"><?php echo Lang::T($_smarty_tpl->tpl_vars['d']->value['service_type']);?>
</span>
                        </li>
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('Account Type');?>
</strong> <span class="float-end"><?php echo Lang::T($_smarty_tpl->tpl_vars['d']->value['account_type']);?>
</span>
                        </li>
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('Balance');?>
</strong> <span class="float-end"><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['d']->value['balance']);?>
</span>
                        </li>
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('Auto Renewal');?>
</strong> <span class="float-end"><?php if ($_smarty_tpl->tpl_vars['d']->value['auto_renewal']) {?>yes<?php } else { ?>no<?php }?></span>
                        </li>
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('Created On');?>
</strong> <span class="float-end"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['d']->value['created_at']);?>
</span>
                        </li>
                        <li class="list-group-item">
                            <strong><?php echo Lang::T('Last Login');?>
</strong> <span class="float-end"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['d']->value['last_login']);?>
</span>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['coordinates']) {?>
                            <li class="list-group-item">
                                <strong><?php echo Lang::T('Coordinates');?>
</strong>
                                <span class="float-end">
                                    <i class="fas fa-map-marker-alt"></i> 
                                    <a target="_blank" href="https://www.google.com/maps/dir//<?php echo $_smarty_tpl->tpl_vars['d']->value['coordinates'];?>
/" style="color: black;"><?php echo Lang::T('Get Directions');?>
</a>
                                </span>
                                <div id="map" style="width: 100%; height: 150px;"></div>
                            </li>
                        <?php }?>
                    </ul>
                    <div class="mt-3">
                        <button type="button" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/delete/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
&token=<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
'" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                            <i class="fas fa-trash"></i> <?php echo Lang::T('Delete');?>

                        </button>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/edit/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
&token=<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" class="btn btn-warning btn-sm mx-1"><?php echo Lang::T('Edit');?>
</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php if ($_smarty_tpl->tpl_vars['v']->value == 'order') {?>active<?php }?>" id="order-tab" data-bs-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="<?php if ($_smarty_tpl->tpl_vars['v']->value == 'order') {?>true<?php } else { ?>false<?php }?>">30 <?php echo Lang::T('Order History');?>
</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php if ($_smarty_tpl->tpl_vars['v']->value == 'activation') {?>active<?php }?>" id="activation-tab" data-bs-toggle="tab" href="#activation" role="tab" aria-controls="activation" aria-selected="<?php if ($_smarty_tpl->tpl_vars['v']->value == 'activation') {?>true<?php } else { ?>false<?php }?>">30 <?php echo Lang::T('Activation History');?>
</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body tab-content" id="myTabContent">
                    <div class="tab-pane fade <?php if ($_smarty_tpl->tpl_vars['v']->value == 'order') {?>show active<?php }?>" id="order" role="tabpanel" aria-labelledby="order-tab">
                        <?php if (Lang::arrayCount($_smarty_tpl->tpl_vars['order']->value)) {?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo Lang::T('Plan Name');?>
</th>
                                            <th><?php echo Lang::T('Gateway');?>
</th>
                                            <th><?php echo Lang::T('Routers');?>
</th>
                                            <th><?php echo Lang::T('Type');?>
</th>
                                            <th><?php echo Lang::T('Plan Price');?>
</th>
                                            <th><?php echo Lang::T('Created On');?>
</th>
                                            <th><?php echo Lang::T('Expires On');?>
</th>
                                            <th><?php echo Lang::T('Date Done');?>
</th>
                                            <th><?php echo Lang::T('Method');?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                            <tr>
                                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['plan_name'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['gateway'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['routers'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['payment_channel'];?>
</td>
                                                <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</td>
                                                <td class="text-primary"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['created_date']);?>
</td>
                                                <td class="text-danger"><?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['expired_date']);?>
</td>
                                                <td class="text-success"><?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] != 1) {
echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ds']->value['paid_date']);
}?></td>
                                                <td><?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 1) {
echo Lang::T('UNPAID');?>

                                                    <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 2) {
echo Lang::T('PAID');?>

                                                    <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 3) {
echo Lang::T('FAILED');?>

                                                    <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 4) {
echo Lang::T('CANCELED');?>

                                                    <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 5) {
echo Lang::T('UNKNOWN');?>

                                                    <?php }?></td>
                                            </tr>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else { ?>
                            <div class="text-center">No orders found.</div>
                        <?php }?>
                        <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    </div>
                    <div class="tab-pane fade <?php if ($_smarty_tpl->tpl_vars['v']->value == 'activation') {?>show active<?php }?>" id="activation" role="tabpanel" aria-labelledby="activation-tab">
                        <?php if (Lang::arrayCount($_smarty_tpl->tpl_vars['activation']->value)) {?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo Lang::T('Invoice');?>
</th>
                                            <th><?php echo Lang::T('Username');?>
</th>
                                            <th><?php echo Lang::T('Plan Name');?>
</th>
                                            <th><?php echo Lang::T('Plan Price');?>
</th>
                                            <th><?php echo Lang::T('Type');?>
</th>
                                            <th><?php echo Lang::T('Created On');?>
</th>
                                            <th><?php echo Lang::T('Expires On');?>
</th>
                                            <th><?php echo Lang::T('Method');?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['activation']->value, 'ds');
$_smarty_tpl->tpl_vars['ds']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->do_else = false;
?>
                                            <tr onclick="window.location.href = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plan/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
'" style="cursor:pointer;">
                                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['invoice'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['username'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['plan_name'];?>
</td>
                                                <td><?php echo Lang::moneyFormat($_smarty_tpl->tpl_vars['ds']->value['price']);?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['type'];?>
</td>
                                                <td class="text-success"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['recharged_on'],$_smarty_tpl->tpl_vars['ds']->value['recharged_time']);?>
</td>
                                                <td class="text-danger"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['ds']->value['expiration'],$_smarty_tpl->tpl_vars['ds']->value['time']);?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['method'];?>
</td>
                                            </tr>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else { ?>
                            <div class="text-center">No activations found.</div>
                        <?php }?>
                        <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 g-3">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['packages']->value, 'package');
$_smarty_tpl->tpl_vars['package']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['package']->value) {
$_smarty_tpl->tpl_vars['package']->do_else = false;
?>
                    <div class="col">
                        <div class="card <?php if ($_smarty_tpl->tpl_vars['package']->value['status'] == 'on') {?>border-success<?php } else { ?>border-danger<?php }?>">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $_smarty_tpl->tpl_vars['package']->value['type'];?>
 - <?php echo $_smarty_tpl->tpl_vars['package']->value['namebp'];?>
 
                                    <span api-get-text="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
autoload/customer_is_active/<?php echo $_smarty_tpl->tpl_vars['package']->value['username'];?>
/<?php echo $_smarty_tpl->tpl_vars['package']->value['plan_id'];?>
"></span>
                                </h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <?php echo Lang::T('Active');?>
 <span class="float-end"><?php if ($_smarty_tpl->tpl_vars['package']->value['status'] == 'on') {?>yes<?php } else { ?>no<?php }?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <?php echo Lang::T('Type');?>
 <span class="float-end"><?php if ($_smarty_tpl->tpl_vars['package']->value['prepaid'] == 'yes') {?>Prepaid<?php } else { ?><strong>Postpaid</strong><?php }?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <?php echo Lang::T('Bandwidth');?>
 <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['package']->value['name_bw'];?>
</span>
                                    </li>
                                    <li class="list-group-item">
                                        <?php echo Lang::T('Created On');?>
 <span class="float-end"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['package']->value['recharged_on'],$_smarty_tpl->tpl_vars['package']->value['recharged_time']);?>
</span>
                                    </li>
                                    <li class="list-group-item">
                                        <?php echo Lang::T('Expires On');?>
 <span class="float-end"><?php echo Lang::dateAndTimeFormat($_smarty_tpl->tpl_vars['package']->value['expiration'],$_smarty_tpl->tpl_vars['package']->value['time']);?>
</span>
                                    </li>
                                    <li class="list-group-item">
                                        <?php echo $_smarty_tpl->tpl_vars['package']->value['routers'];?>
 <span class="float-end"><?php echo $_smarty_tpl->tpl_vars['package']->value['method'];?>
</span>
                                    </li>
                                </ul>
                                <div class="mt-3 text-center">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/deactivate/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['package']->value['plan_id'];?>
&token=<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" class="btn btn-danger me-2" onclick="return confirm('This will deactivate Customer Plan, and make it expired')">
                                        <?php echo Lang::T('Deactivate');?>

                                    </a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/recharge/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['package']->value['plan_id'];?>
&token=<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" class="btn btn-success">
                                        <?php echo Lang::T('Recharge');?>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-3 mb-3">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/list" class="btn btn-primary btn-block"><?php echo Lang::T('Back');?>
</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/sync/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
&token=<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" onclick="return confirm('This will sync Customer to Mikrotik?')" class="btn btn-info btn-block"><?php echo Lang::T('Sync');?>
</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
message/send/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
&token=<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" class="btn btn-success btn-block"><?php echo Lang::T('Send Message');?>
</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/login/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
&token=<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" target="_blank" class="btn btn-warning btn-block"><?php echo Lang::T('Login as Customer');?>
</a>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmModalLabel"><?php echo Lang::T('Confirm Deletion');?>
</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo Lang::T('Are you sure you want to delete this user?');?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo Lang::T('Cancel');?>
</button>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/delete/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
&token=<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" class="btn btn-danger"><?php echo Lang::T('Delete');?>
</a>
            </div>
        </div>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['d']->value['coordinates']) {?>
    
        <?php echo '<script'; ?>
 src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            function setupMap(lat, lon) {
                var map = L.map('map').setView([lat, lon], 17);
                L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/light_all/{z}/{x}/{y}.png', {
                    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors © <a href="https://carto.com/attributions">CARTO</a>',
                    subdomains: 'abcd',
                    maxZoom: 20
                }).addTo(map);
                var marker = L.marker([lat, lon]).addTo(map);
            }
            document.addEventListener('DOMContentLoaded', function() {
                setupMap(<?php echo $_smarty_tpl->tpl_vars['d']->value['coordinates'];?>
);
            });
        <?php echo '</script'; ?>
>
    
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
