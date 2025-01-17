<?php
/* Smarty version 4.5.3, created on 2025-01-17 15:48:11
  from '/home/wachira/Kipawa/ui/ui/dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_678a518b6042b1_01357052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40bccff26256f7d4325edbaba809929b3edaca30' => 
    array (
      0 => '/home/wachira/Kipawa/ui/ui/dashboard.tpl',
      1 => 1737118088,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_678a518b6042b1_01357052 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid py-5">
    <div class="row g-5">
        <?php if (in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Report'))) {?>
            <!-- Income Today -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 text-center border-0 shadow-lg">
                    <div class="card-header bg-primary text-white py-3">
                        <h6 class="text-uppercase mb-0">Income Today</h6>
                    </div>
                    <div class="card-body bg-light">
                        <h3 class="card-title fw-bold text-primary"><sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup> <?php echo number_format($_smarty_tpl->tpl_vars['iday']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</h3>
                        <i class="fas fa-clock fa-3x text-primary"></i>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/by-date" class="btn btn-outline-primary btn-block">View Report</a>
                    </div>
                </div>
            </div>

            <!-- Income This Month -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 text-center border-0 shadow-lg">
                    <div class="card-header bg-success text-white py-3">
                        <h6 class="text-uppercase mb-0">Income This Month</h6>
                    </div>
                    <div class="card-body bg-light">
                        <h3 class="card-title fw-bold text-success"><sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup> <?php echo number_format($_smarty_tpl->tpl_vars['imonth']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</h3>
                        <i class="fas fa-calendar-alt fa-3x text-success"></i>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/by-period" class="btn btn-outline-success btn-block">View Report</a>
                    </div>
                </div>
            </div>
        <?php }?>

        <!-- Active/Expired Plans -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 text-center border-0 shadow-lg">
                <div class="card-header bg-warning text-dark py-3">
                    <h6 class="text-uppercase mb-0">Active / Expired</h6>
                </div>
                <div class="card-body bg-light">
                    <h3 class="card-title fw-bold text-warning"><?php echo $_smarty_tpl->tpl_vars['u_act']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['u_all']->value-$_smarty_tpl->tpl_vars['u_act']->value;?>
</h3>
                    <i class="fas fa-users fa-3x text-warning"></i>
                </div>
                <div class="card-footer bg-white">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plan/list" class="btn btn-outline-warning btn-block">View Details</a>
                </div>
            </div>
        </div>

        <!-- Total Customers -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 text-center border-0 shadow-lg">
                <div class="card-header bg-danger text-white py-3">
                    <h6 class="text-uppercase mb-0">Total Customers</h6>
                </div>
                <div class="card-body bg-light">
                    <h3 class="card-title fw-bold text-danger"><?php echo $_smarty_tpl->tpl_vars['c_all']->value;?>
</h3>
                    <i class="fas fa-users-cog fa-3x text-danger"></i>
                </div>
                <div class="card-footer bg-white">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/list" class="btn btn-outline-danger btn-block">View Customers</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb Section -->
    <nav class="mt-4" aria-label="breadcrumb">
        <ol class="breadcrumb bg-white p-3 shadow-sm rounded">
            <li class="breadcrumb-item"><?php echo Lang::dateFormat($_smarty_tpl->tpl_vars['start_date']->value);?>
</li>
            <li class="breadcrumb-item"><?php echo Lang::dateFormat($_smarty_tpl->tpl_vars['current_date']->value);?>
</li>
            <?php if ($_smarty_tpl->tpl_vars['_c']->value['enable_balance'] == 'yes' && in_array($_smarty_tpl->tpl_vars['_admin']->value['user_type'],array('SuperAdmin','Admin','Report'))) {?>
                <li class="breadcrumb-item active" style="cursor: pointer;" onclick="window.location.href = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers&search=&order=balance&filter=Active&orderby=desc'">
                    <strong>Customer Balance:</strong> <sup><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
</sup>
                    <?php echo number_format($_smarty_tpl->tpl_vars['cb']->value,0,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>

                </li>
            <?php }?>
        </ol>
    </nav>
</div>
<div class="row gx-4 gy-5">

    <div class="col-lg-5">

        <!-- Routers Offline -->
        <?php if ($_smarty_tpl->tpl_vars['_c']->value['router_check'] && count($_smarty_tpl->tpl_vars['routeroffs']->value) > 0) {?>
            <div class="card mb-4 border-0 shadow">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0"><?php echo Lang::T('Routers Offline');?>
</h4>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['routeroffs']->value, 'ros');
$_smarty_tpl->tpl_vars['ros']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ros']->value) {
$_smarty_tpl->tpl_vars['ros']->do_else = false;
?>
                                <tr>
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
routers/edit/<?php echo $_smarty_tpl->tpl_vars['ros']->value['id'];?>
" class="text-danger"><?php echo $_smarty_tpl->tpl_vars['ros']->value['name'];?>
</a></td>
                                    <td data-bs-toggle="tooltip" data-bs-placement="top" class="text-danger"
                                        title="<?php echo Lang::dateTimeFormat($_smarty_tpl->tpl_vars['ros']->value['last_seen']);?>
"><?php echo Lang::timeElapsed($_smarty_tpl->tpl_vars['ros']->value['last_seen']);?>

                                    </td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php }?>

        <!-- Cron Job Information -->
        <?php if ($_smarty_tpl->tpl_vars['run_date']->value) {?>
            <?php $_smarty_tpl->_assignInScope('current_time', time());?>
            <?php $_smarty_tpl->_assignInScope('run_time', strtotime($_smarty_tpl->tpl_vars['run_date']->value));?>
            <?php if ($_smarty_tpl->tpl_vars['current_time']->value-$_smarty_tpl->tpl_vars['run_time']->value > 3600) {?>
                <div class="card mb-4 border-0 shadow">
                    <div class="card-header bg-warning text-white">
                        <h4 class="mb-0"><i class="fas fa-clock"></i> <?php echo Lang::T('Cron has not run for over 1 hour. Please check your setup.');?>
</h4>
                    </div>
                </div>
            <?php } else { ?>
                <div class="card mb-4 border-0 shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0"><?php echo Lang::T('Cron Job last ran on');?>
: <?php echo $_smarty_tpl->tpl_vars['run_date']->value;?>
</h4>
                    </div>
                </div>
            <?php }?>
        <?php } else { ?>
            <div class="card mb-4 border-0 shadow">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0"><i class="fas fa-exclamation-triangle"></i> <?php echo Lang::T('Cron appears not to have been setup, please check your cron setup.');?>
</h4>
                </div>
            </div>
        <?php }?>

        <!-- Payment Gateway -->
        <?php if ($_smarty_tpl->tpl_vars['_c']->value['hide_pg'] != 'yes') {?>
            <div class="card mb-4 border-0 shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><?php echo Lang::T('Payment Gateway');?>
: <?php echo str_replace(',',', ',$_smarty_tpl->tpl_vars['_c']->value['payment_gateway']);?>
</h4>
                </div>
            </div>
        <?php }?>

        <!-- All Users Insights -->
        <?php if ($_smarty_tpl->tpl_vars['_c']->value['hide_aui'] != 'yes') {?>
            <div class="card mb-4 border-0 shadow">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0"><?php echo Lang::T('All Users Insights');?>
</h4>
                </div>
                <div class="card-body">
                    <canvas id="userRechargesChart"></canvas>
                </div>
            </div>
        <?php }?>

       
    </div>
    <div class="row gx-4">
  

    <!-- Activity Log -->
    <?php if ($_smarty_tpl->tpl_vars['_c']->value['hide_al'] != 'yes') {?>
        <div class="col-md-6">
            <div class="card mb-4 border-0 shadow">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
logs" class="text-white"><?php echo Lang::T('Activity Log');?>
</a></h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dlog']->value, 'dlogs');
$_smarty_tpl->tpl_vars['dlogs']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dlogs']->value) {
$_smarty_tpl->tpl_vars['dlogs']->do_else = false;
?>
                            <li class="text-primary">
                                <i class="fas fa-dot-circle"></i>
                                <span class="time small text-muted"><?php echo Lang::timeElapsed($_smarty_tpl->tpl_vars['dlogs']->value['date'],true);?>
</span>
                                <p><?php echo $_smarty_tpl->tpl_vars['dlogs']->value['description'];?>
</p>
                            </li>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            </div>
        </div>
    <?php }?>
</div>
</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    <?php if ($_smarty_tpl->tpl_vars['_c']->value['hide_mrc'] != 'yes') {?>
        
            document.addEventListener("DOMContentLoaded", function() {
                var counts = JSON.parse('<?php echo json_encode($_smarty_tpl->tpl_vars['monthlyRegistered']->value);?>
');

                var monthNames = [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ];

                var labels = [];
                var data = [];

                for (var i = 1; i <= 12; i++) {
                    var month = counts.find(count => count.date === i);
                    labels.push(month ? monthNames[i - 1] : monthNames[i - 1].substring(0, 3));
                    data.push(month ? month.count : 0);
                }

                var ctx = document.getElementById('chart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Registered Members',
                            data: data,
                            backgroundColor: 'rgba(0, 0, 255, 0.5)',
                            borderColor: 'rgba(0, 0, 255, 0.7)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.1)'
                                }
                            }
                        }
                    }
                });
            });
        
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['_c']->value['hide_tmc'] != 'yes') {?>
        
            document.addEventListener("DOMContentLoaded", function() {
                var monthlySales = JSON.parse('<?php echo json_encode($_smarty_tpl->tpl_vars['monthlySales']->value);?>
');

                var monthNames = [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ];

                var labels = [];
                var data = [];

                for (var i = 1; i <= 12; i++) {
                    var month = findMonthData(monthlySales, i);
                    labels.push(month ? monthNames[i - 1] : monthNames[i - 1].substring(0, 3));
                    data.push(month ? month.totalSales : 0);
                }

                var ctx = document.getElementById('salesChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Monthly Sales',
                            data: data,
                            backgroundColor: 'rgba(2, 10, 242)', // Customize the background color
                            borderColor: 'rgba(255, 99, 132, 1)', // Customize the border color
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.1)'
                                }
                            }
                        }
                    }
                });
            });

            function findMonthData(monthlySales, month) {
                for (var i = 0; i < monthlySales.length; i++) {
                    if (monthlySales[i].month === month) {
                        return monthlySales[i];
                    }
                }
                return null;
            }
        
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['_c']->value['hide_aui'] != 'yes') {?>
        
            document.addEventListener("DOMContentLoaded", function() {
                // Get the data from PHP and assign it to JavaScript variables
                var u_act = '<?php echo $_smarty_tpl->tpl_vars['u_act']->value;?>
';
                var c_all = '<?php echo $_smarty_tpl->tpl_vars['c_all']->value;?>
';
                var u_all = '<?php echo $_smarty_tpl->tpl_vars['u_all']->value;?>
';
                //lets calculate the inactive users as reported
                var expired = u_all - u_act;
                var inactive = c_all - u_all;
                if (inactive < 0) {
                    inactive = 0;
                }
                // Create the chart data
                 var data = {
            labels: ['Active Users', 'Expired Users', 'Inactive Users'],
            datasets: [{
                label: 'User Status',
                data: [parseInt(u_act), parseInt(expired), parseInt(inactive)],
                backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 99, 132, 0.5)', 'rgba(255, 206, 86, 0.5)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 206, 86, 1)'],
                borderWidth: 1
            }]
        };

                // Create chart options
                var options = {
                    responsive: true,
                    aspectRatio: 1,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 15
                            }
                        }
                    }
                };

                // Get the canvas element and create the chart
                var ctx = document.getElementById('userRechargesChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: data,
                    options: options
                });
            });
        
    <?php }
echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['_c']->value['new_version_notify'] != 'disable') {?>
    <?php echo '<script'; ?>
>
        window.addEventListener('DOMContentLoaded', function() {
            $.getJSON("./version.json?" + Math.random(), function(data) {
                var localVersion = data.version;
                $('#version').html('Version: ' + localVersion);
                $.getJSON(
                    "https://raw.githubusercontent.com/hotspotbilling/phpnuxbill/master/version.json?" +
                    Math
                    .random(),
                    function(data) {
                        var latestVersion = data.version;
                        if (localVersion !== latestVersion) {
                            $('#version').html('Latest Version: ' + latestVersion);
                            if (getCookie(latestVersion) != 'done') {
                                Swal.fire({
                                    icon: 'info',
                                    title: "New Version Available\nVersion: " + latestVersion,
                                    toast: true,
                                    position: 'bottom-right',
                                    showConfirmButton: true,
                                    showCloseButton: true,
                                    timer: 30000,
                                    confirmButtonText: '<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
community#latestVersion" style="color: white;">Update Now</a>',
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal
                                            .resumeTimer)
                                    }
                                });
                                setCookie(latestVersion, 'done', 7);
                            }
                        }
                    });
            });

        });
    <?php echo '</script'; ?>
>
<?php }?> 
<?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['_c']->value['new_version_notify'] != 'disable') {
echo '<script'; ?>
>
    window.addEventListener('DOMContentLoaded', function() {
        $.getJSON("./version.json?" + Math.random(), function(data) {
            var localVersion = data.version;
            $('#version').html('Version: ' + localVersion);
            $.getJSON(
                "https://raw.githubusercontent.com/hotspotbilling/phpnuxbill/master/version.json?" +
                Math.random(),
                function(data) {
                    var latestVersion = data.version;
                    if (localVersion !== latestVersion) {
                        $('#version').html('Latest Version: ' + latestVersion);
                        if (getCookie(latestVersion) != 'done') {
                            Swal.fire({
                                icon: 'info',
                                title: "New Version Available\nVersion: " + latestVersion,
                                toast: true,
                                position: 'top-right', // Changed from bottom-right to top-right
                                showConfirmButton: true,
                                showCloseButton: true,
                                timer: 30000,
                                confirmButtonText: '<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
community#latestVersion" style="color: white; text-decoration: none;">Update Now</a>',
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                },
                                customClass: {
                                    popup: 'swal2-notification' // Custom class for styling
                                }
                            });
                            setCookie(latestVersion, 'done', 7);
                        }
                    }
                });
        });

    });
<?php echo '</script'; ?>
>
<style>
    /* Custom styling for SweetAlert */
    .swal2-notification {
        background: #17a2b8;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .swal2-title {
        color: white;
    }
    .swal2-confirm {
        background-color: #007BFF;
        border: none;
    }
    .swal2-confirm:focus {
        outline: none;
        box-shadow: none;
    }
</style>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
