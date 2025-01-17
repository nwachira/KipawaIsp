{include file="sections/header.tpl"}

<div class="container-fluid py-5">
    <div class="row g-5">
        {if in_array($_admin['user_type'], ['SuperAdmin', 'Admin', 'Report'])}
            <!-- Income Today -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 text-center border-0 shadow-lg">
                    <div class="card-header bg-primary text-white py-3">
                        <h6 class="text-uppercase mb-0">Income Today</h6>
                    </div>
                    <div class="card-body bg-light">
                        <h3 class="card-title fw-bold text-primary"><sup>{$_c['currency_code']}</sup> {number_format($iday, 0, $_c['dec_point'], $_c['thousands_sep'])}</h3>
                        <i class="fas fa-clock fa-3x text-primary"></i>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="{$_url}reports/by-date" class="btn btn-outline-primary btn-block">View Report</a>
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
                        <h3 class="card-title fw-bold text-success"><sup>{$_c['currency_code']}</sup> {number_format($imonth, 0, $_c['dec_point'], $_c['thousands_sep'])}</h3>
                        <i class="fas fa-calendar-alt fa-3x text-success"></i>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="{$_url}reports/by-period" class="btn btn-outline-success btn-block">View Report</a>
                    </div>
                </div>
            </div>
        {/if}

        <!-- Active/Expired Plans -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 text-center border-0 shadow-lg">
                <div class="card-header bg-warning text-dark py-3">
                    <h6 class="text-uppercase mb-0">Active / Expired</h6>
                </div>
                <div class="card-body bg-light">
                    <h3 class="card-title fw-bold text-warning">{$u_act}/{$u_all - $u_act}</h3>
                    <i class="fas fa-users fa-3x text-warning"></i>
                </div>
                <div class="card-footer bg-white">
                    <a href="{$_url}plan/list" class="btn btn-outline-warning btn-block">View Details</a>
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
                    <h3 class="card-title fw-bold text-danger">{$c_all}</h3>
                    <i class="fas fa-users-cog fa-3x text-danger"></i>
                </div>
                <div class="card-footer bg-white">
                    <a href="{$_url}customers/list" class="btn btn-outline-danger btn-block">View Customers</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb Section -->
    <nav class="mt-4" aria-label="breadcrumb">
        <ol class="breadcrumb bg-white p-3 shadow-sm rounded">
            <li class="breadcrumb-item">{Lang::dateFormat($start_date)}</li>
            <li class="breadcrumb-item">{Lang::dateFormat($current_date)}</li>
            {if $_c['enable_balance'] == 'yes' && in_array($_admin['user_type'], ['SuperAdmin', 'Admin', 'Report'])}
                <li class="breadcrumb-item active" style="cursor: pointer;" onclick="window.location.href = '{$_url}customers&search=&order=balance&filter=Active&orderby=desc'">
                    <strong>Customer Balance:</strong> <sup>{$_c['currency_code']}</sup>
                    {number_format($cb, 0, $_c['dec_point'], $_c['thousands_sep'])}
                </li>
            {/if}
        </ol>
    </nav>
</div>
<div class="row gx-4 gy-5">

    <div class="col-lg-5">

        <!-- Routers Offline -->
        {if $_c['router_check'] && count($routeroffs)> 0}
            <div class="card mb-4 border-0 shadow">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">{Lang::T('Routers Offline')}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <tbody>
                            {foreach $routeroffs as $ros}
                                <tr>
                                    <td><a href="{$_url}routers/edit/{$ros['id']}" class="text-danger">{$ros['name']}</a></td>
                                    <td data-bs-toggle="tooltip" data-bs-placement="top" class="text-danger"
                                        title="{Lang::dateTimeFormat($ros['last_seen'])}">{Lang::timeElapsed($ros['last_seen'])}
                                    </td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        {/if}

        <!-- Cron Job Information -->
        {if $run_date}
            {assign var="current_time" value=$smarty.now}
            {assign var="run_time" value=strtotime($run_date)}
            {if $current_time - $run_time > 3600}
                <div class="card mb-4 border-0 shadow">
                    <div class="card-header bg-warning text-white">
                        <h4 class="mb-0"><i class="fas fa-clock"></i> {Lang::T('Cron has not run for over 1 hour. Please check your setup.')}</h4>
                    </div>
                </div>
            {else}
                <div class="card mb-4 border-0 shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">{Lang::T('Cron Job last ran on')}: {$run_date}</h4>
                    </div>
                </div>
            {/if}
        {else}
            <div class="card mb-4 border-0 shadow">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0"><i class="fas fa-exclamation-triangle"></i> {Lang::T('Cron appears not to have been setup, please check your cron setup.')}</h4>
                </div>
            </div>
        {/if}

        <!-- Payment Gateway -->
        {if $_c['hide_pg'] != 'yes'}
            <div class="card mb-4 border-0 shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">{Lang::T('Payment Gateway')}: {str_replace(',',', ',$_c['payment_gateway'])}</h4>
                </div>
            </div>
        {/if}

        <!-- All Users Insights -->
        {if $_c['hide_aui'] != 'yes'}
            <div class="card mb-4 border-0 shadow">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">{Lang::T('All Users Insights')}</h4>
                </div>
                <div class="card-body">
                    <canvas id="userRechargesChart"></canvas>
                </div>
            </div>
        {/if}

       
    </div>
    <div class="row gx-4">
  

    <!-- Activity Log -->
    {if $_c['hide_al'] != 'yes'}
        <div class="col-md-6">
            <div class="card mb-4 border-0 shadow">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0"><a href="{$_url}logs" class="text-white">{Lang::T('Activity Log')}</a></h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        {foreach $dlog as $dlogs}
                            <li class="text-primary">
                                <i class="fas fa-dot-circle"></i>
                                <span class="time small text-muted">{Lang::timeElapsed($dlogs['date'],true)}</span>
                                <p>{$dlogs['description']}</p>
                            </li>
                        {/foreach}
                    </ul>
                </div>
            </div>
        </div>
    {/if}
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
<script type="text/javascript">
    {if $_c['hide_mrc'] != 'yes'}
        {literal}
            document.addEventListener("DOMContentLoaded", function() {
                var counts = JSON.parse('{/literal}{$monthlyRegistered|json_encode}{literal}');

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
        {/literal}
    {/if}
    {if $_c['hide_tmc'] != 'yes'}
        {literal}
            document.addEventListener("DOMContentLoaded", function() {
                var monthlySales = JSON.parse('{/literal}{$monthlySales|json_encode}{literal}');

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
        {/literal}
    {/if}
    {if $_c['hide_aui'] != 'yes'}
        {literal}
            document.addEventListener("DOMContentLoaded", function() {
                // Get the data from PHP and assign it to JavaScript variables
                var u_act = '{/literal}{$u_act}{literal}';
                var c_all = '{/literal}{$c_all}{literal}';
                var u_all = '{/literal}{$u_all}{literal}';
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
        {/literal}
    {/if}
</script>
{if $_c['new_version_notify'] != 'disable'}
    <script>
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
                                    confirmButtonText: '<a href="{$_url}community#latestVersion" style="color: white;">Update Now</a>',
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
    </script>
{/if} 
</script>
{if $_c['new_version_notify'] != 'disable'}
<script>
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
                                confirmButtonText: '<a href="{$_url}community#latestVersion" style="color: white; text-decoration: none;">Update Now</a>',
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
</script>
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
{/if}

{include file="sections/footer.tpl"}
