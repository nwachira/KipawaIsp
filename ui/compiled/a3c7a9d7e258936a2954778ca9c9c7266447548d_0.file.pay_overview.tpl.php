<?php
/* Smarty version 4.5.3, created on 2025-01-17 15:08:45
  from '/home/wachira/Kipawa/system/plugin/ui/pay_overview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_678a484d985897_37008275',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3c7a9d7e258936a2954778ca9c9c7266447548d' => 
    array (
      0 => '/home/wachira/Kipawa/system/plugin/ui/pay_overview.tpl',
      1 => 1737115593,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_678a484d985897_37008275 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
    .stats {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .stats .stat-box {
        background-color: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        flex: 1;
        margin: 10px;
        min-width: 200px;
    }

    .stat-box h3 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }

    .stat-box p {
        font-size: 18px;
        color: #666;
    }

    .table-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
    }

    .table-container h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ccc;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .button {
        background-color: #e74c3c;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .button:hover {
        background-color: #c0392b;
    }
    /* Styles for overall layout and responsiveness */
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    /* Styles for table and pagination */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .table th {
        vertical-align: middle;
        border-color: #dee2e6;
        background-color: #343a40;
        color: #fff;
    }

    .table td {
        vertical-align: middle;
        border-color: #dee2e6;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
        color: #333;
        font-weight: bold;
        transition: background-color 0.3s, color 0.3s;
    }
    .pagination .page-item .page-link {
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
        margin: 0 2px;
        padding: 6px 12px;
        transition: background-color 0.3s, color 0.3s;
    }

    .pagination .page-item .page-link:hover {
        background-color: #e9ecef;
        color: #0056b3;
    }

    .pagination .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

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
<?php if ((isset($_smarty_tpl->tpl_vars['message']->value))) {?>
<div class="alert alert-<?php if ($_smarty_tpl->tpl_vars['notify_t']->value == 's') {?>success<?php } else { ?>danger<?php }?>">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
    </button>
    <div><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
</div>
<?php }?>
<div class="main-content">
    <div class="stats">
        <div class="stat-box">
            <h3><?php echo Lang::T('Successful Payments');?>
 <br> <br> <br><p><?php echo $_smarty_tpl->tpl_vars['successfulPayments']->value;?>
</p> </h3>
        </div>
        <div class="stat-box">
            <h3><?php echo Lang::T('Failed Payments');?>
 <br> <br><br><p><?php echo $_smarty_tpl->tpl_vars['failedPayments']->value;?>
</p> </h3>
        </div>
        <div class="stat-box">
            <h3><?php echo Lang::T('Pending Payments');?>
<br> <br><br><p><?php echo $_smarty_tpl->tpl_vars['pendingPayments']->value;?>
</p> </h3>
        </div>
    </div>
<br><br><br>
    <div class="table-container">
        <h2><?php echo Lang::T('Payment History');?>
</h2>
        <table class="table" id="payments-table">
            <thead>
                <tr>
                    <th><?php echo Lang::T('Username');?>
</th>
                    <th><?php echo Lang::T('Transaction ID');?>
</th>
                    <th><?php echo Lang::T('Transaction Ref');?>
</th>
                    <th><?php echo Lang::T('Router Name');?>
</th>
                    <th><?php echo Lang::T('Plan Name');?>
</th>
                    <th><?php echo Lang::T('Amount');?>
</th>
                    <th><?php echo Lang::T('Phone Number');?>
</th>
                    <th><?php echo Lang::T('Transaction Status');?>
</th>
                    <th><?php echo Lang::T('Payment Gateway');?>
</th>
                    <th><?php echo Lang::T('Payment Method');?>
</th>
                    <!-- <th><?php echo Lang::T('Created Date');?>
</th> -->
                    <th><?php echo Lang::T('Payment Date');?>
</th>
                    <th><?php echo Lang::T('Plan Expiry Date');?>
</th>
                    <!-- <th><?php echo Lang::T('Action');?>
</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['payments']->value, 'payment');
$_smarty_tpl->tpl_vars['payment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['payment']->value) {
$_smarty_tpl->tpl_vars['payment']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['username'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['transaction_id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['transaction_ref'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['router_name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['plan_name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['amount'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['phone_number'];?>
</td>
                    <td><span
                            class="label <?php if ($_smarty_tpl->tpl_vars['payment']->value['transaction_status'] == 'paid') {?>label-success <?php } elseif ($_smarty_tpl->tpl_vars['payment']->value['transaction_status'] == 'pending') {?>label-warning <?php } elseif ($_smarty_tpl->tpl_vars['payment']->value['transaction_status'] == 'failed') {?>label-danger <?php } elseif ($_smarty_tpl->tpl_vars['payment']->value['transaction_status'] == 'cancelled') {?>label-danger <?php }?>"><?php echo $_smarty_tpl->tpl_vars['payment']->value['transaction_status'];?>
</span>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['payment_gateway'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['payment_method'];?>
</td>
                    <!-- <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['created_date'];?>
</td> -->
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['payment_date'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['payment']->value['expired_date'];?>
</td>
                                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
</div>
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var $j = jQuery.noConflict();

    $j(document).ready(function () {
        $j('#payments-table').DataTable({
            "pagingType": "full_numbers"
        });
    });
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
