{include file="sections/header.tpl"}

<div class="container-fluid">
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card {if $d['status']=='Active'}border-primary{else}border-danger{/if}">
                <div class="card-body text-center">
                    <img class="profile-user-img img-fluid rounded-circle mb-3"
                        onclick="window.location.href = '{$UPLOAD_PATH}{$d['photo']}'"
                        src="{$UPLOAD_PATH}{$d['photo']}.thumb.jpg"
                        onerror="this.src='{$UPLOAD_PATH}/user.default.jpg'" alt="User Avatar">
                    <h3 class="card-title">{$d['fullname']}</h3>
                    <ul class="list-group list-group-flush text-left">
                        <li class="list-group-item">
                            <strong>{Lang::T('Status')}</strong> 
                            <span class="badge {if $d['status'] !='Active'}bg-danger{else}bg-primary{/if} float-end">{Lang::T($d['status'])}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>{Lang::T('Username')}</strong> <span class="float-end">{$d['username']}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>{Lang::T('Phone Number')}</strong> <span class="float-end">{$d['phonenumber']}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>{Lang::T('Email')}</strong> <span class="float-end">{$d['email']}</span>
                        </li>
                        <li class="list-group-item">{Lang::nl2br($d['address'])}</li>
                        <li class="list-group-item">
                            <strong>{Lang::T('City')}</strong> <span class="float-end">{$d['city']}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>{Lang::T('District')}</strong> <span class="float-end">{$d['district']}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>{Lang::T('State')}</strong> <span class="float-end">{$d['state']}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>{Lang::T('Zip')}</strong> <span class="float-end">{$d['zip']}</span>
                        </li>
                        {if in_array($_admin['user_type'],['SuperAdmin','Admin'])}
                            <li class="list-group-item">
                                <strong>{Lang::T('Password')}</strong>
                                <input type="password" value="{$d['password']}" class="form-control-plaintext float-end text-end" 
                                       onmouseleave="this.type = 'password'" onmouseenter="this.type = 'text'" onclick="this.select()">
                            </li>
                        {/if}
                        {if $d['pppoe_username'] != ''}
                            <li class="list-group-item">
                                <strong>PPPOE {Lang::T('Username')}</strong> <span class="float-end">{$d['pppoe_username']}</span>
                            </li>
                        {/if}
                        {if $d['pppoe_password'] != '' && in_array($_admin['user_type'],['SuperAdmin','Admin'])}
                            <li class="list-group-item">
                                <strong>PPPOE {Lang::T('Password')}</strong>
                                <input type="password" value="{$d['pppoe_password']}" class="form-control-plaintext float-end text-end" 
                                       onmouseleave="this.type = 'password'" onmouseenter="this.type = 'text'" onclick="this.select()">
                            </li>
                        {/if}
                        {if $d['pppoe_ip'] != ''}
                            <li class="list-group-item">
                                <strong>PPPOE Remote IP</strong> <span class="float-end">{$d['pppoe_ip']}</span>
                            </li>
                        {/if}
                        <!--Customers Attributes view start -->
                        {if $customFields}
                            {foreach $customFields as $customField}
                                <li class="list-group-item">
                                    <strong>{$customField.field_name}</strong> 
                                    <span class="float-end">
                                        {if strpos($customField.field_value, ':0') === false}
                                            {$customField.field_value}
                                        {else}
                                            <strong>{Lang::T('Paid')}</strong>
                                        {/if}
                                    </span>
                                </li>
                            {/foreach}
                        {/if}
                        <!--Customers Attributes view end -->
                        <li class="list-group-item">
                            <strong>{Lang::T('Service Type')}</strong> <span class="float-end">{Lang::T($d['service_type'])}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>{Lang::T('Account Type')}</strong> <span class="float-end">{Lang::T($d['account_type'])}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>{Lang::T('Balance')}</strong> <span class="float-end">{Lang::moneyFormat($d['balance'])}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>{Lang::T('Auto Renewal')}</strong> <span class="float-end">{if $d['auto_renewal']}yes{else}no{/if}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>{Lang::T('Created On')}</strong> <span class="float-end">{Lang::dateTimeFormat($d['created_at'])}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>{Lang::T('Last Login')}</strong> <span class="float-end">{Lang::dateTimeFormat($d['last_login'])}</span>
                        </li>
                        {if $d['coordinates']}
                            <li class="list-group-item">
                                <strong>{Lang::T('Coordinates')}</strong>
                                <span class="float-end">
                                    <i class="fas fa-map-marker-alt"></i> 
                                    <a target="_blank" href="https://www.google.com/maps/dir//{$d['coordinates']}/" style="color: black;">{Lang::T('Get Directions')}</a>
                                </span>
                                <div id="map" style="width: 100%; height: 150px;"></div>
                            </li>
                        {/if}
                    </ul>
                    <div class="mt-3">
                        <button type="button" onclick="window.location.href='{$_url}customers/delete/{$d['id']}&token={$csrf_token}'" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                            <i class="fas fa-trash"></i> {Lang::T('Delete')}
                        </button>
                        <a href="{$_url}customers/edit/{$d['id']}&token={$csrf_token}" class="btn btn-warning btn-sm mx-1">{Lang::T('Edit')}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {if $v=='order'}active{/if}" id="order-tab" data-bs-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="{if $v=='order'}true{else}false{/if}">30 {Lang::T('Order History')}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {if $v=='activation'}active{/if}" id="activation-tab" data-bs-toggle="tab" href="#activation" role="tab" aria-controls="activation" aria-selected="{if $v=='activation'}true{else}false{/if}">30 {Lang::T('Activation History')}</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body tab-content" id="myTabContent">
                    <div class="tab-pane fade {if $v=='order'}show active{/if}" id="order" role="tabpanel" aria-labelledby="order-tab">
                        {if Lang::arrayCount($order)}
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>{Lang::T('Plan Name')}</th>
                                            <th>{Lang::T('Gateway')}</th>
                                            <th>{Lang::T('Routers')}</th>
                                            <th>{Lang::T('Type')}</th>
                                            <th>{Lang::T('Plan Price')}</th>
                                            <th>{Lang::T('Created On')}</th>
                                            <th>{Lang::T('Expires On')}</th>
                                            <th>{Lang::T('Date Done')}</th>
                                            <th>{Lang::T('Method')}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach $order as $ds}
                                            <tr>
                                                <td>{$ds['plan_name']}</td>
                                                <td>{$ds['gateway']}</td>
                                                <td>{$ds['routers']}</td>
                                                <td>{$ds['payment_channel']}</td>
                                                <td>{Lang::moneyFormat($ds['price'])}</td>
                                                <td class="text-primary">{Lang::dateTimeFormat($ds['created_date'])}</td>
                                                <td class="text-danger">{Lang::dateTimeFormat($ds['expired_date'])}</td>
                                                <td class="text-success">{if $ds['status']!=1}{Lang::dateTimeFormat($ds['paid_date'])}{/if}</td>
                                                <td>{if $ds['status']==1}{Lang::T('UNPAID')}
                                                    {elseif $ds['status']==2}{Lang::T('PAID')}
                                                    {elseif $ds['status']==3}{Lang::T('FAILED')}
                                                    {elseif $ds['status']==4}{Lang::T('CANCELED')}
                                                    {elseif $ds['status']==5}{Lang::T('UNKNOWN')}
                                                    {/if}</td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        {else}
                            <div class="text-center">No orders found.</div>
                        {/if}
                        {include file="pagination.tpl"}
                    </div>
                    <div class="tab-pane fade {if $v=='activation'}show active{/if}" id="activation" role="tabpanel" aria-labelledby="activation-tab">
                        {if Lang::arrayCount($activation)}
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>{Lang::T('Invoice')}</th>
                                            <th>{Lang::T('Username')}</th>
                                            <th>{Lang::T('Plan Name')}</th>
                                            <th>{Lang::T('Plan Price')}</th>
                                            <th>{Lang::T('Type')}</th>
                                            <th>{Lang::T('Created On')}</th>
                                            <th>{Lang::T('Expires On')}</th>
                                            <th>{Lang::T('Method')}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach $activation as $ds}
                                            <tr onclick="window.location.href = '{$_url}plan/view/{$ds['id']}'" style="cursor:pointer;">
                                                <td>{$ds['invoice']}</td>
                                                <td>{$ds['username']}</td>
                                                <td>{$ds['plan_name']}</td>
                                                <td>{Lang::moneyFormat($ds['price'])}</td>
                                                <td>{$ds['type']}</td>
                                                <td class="text-success">{Lang::dateAndTimeFormat($ds['recharged_on'],$ds['recharged_time'])}</td>
                                                <td class="text-danger">{Lang::dateAndTimeFormat($ds['expiration'],$ds['time'])}</td>
                                                <td>{$ds['method']}</td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        {else}
                            <div class="text-center">No activations found.</div>
                        {/if}
                        {include file="pagination.tpl"}
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 g-3">
                {foreach $packages as $package}
                    <div class="col">
                        <div class="card {if $package['status']=='on'}border-success{else}border-danger{/if}">
                            <div class="card-body">
                                <h5 class="card-title text-center">{$package['type']} - {$package['namebp']} 
                                    <span api-get-text="{$_url}autoload/customer_is_active/{$package['username']}/{$package['plan_id']}"></span>
                                </h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        {Lang::T('Active')} <span class="float-end">{if $package['status']=='on'}yes{else}no{/if}</span>
                                    </li>
                                    <li class="list-group-item">
                                        {Lang::T('Type')} <span class="float-end">{if $package['prepaid'] eq 'yes'}Prepaid{else}<strong>Postpaid</strong>{/if}</span>
                                    </li>
                                    <li class="list-group-item">
                                        {Lang::T('Bandwidth')} <span class="float-end">{$package['name_bw']}</span>
                                    </li>
                                    <li class="list-group-item">
                                        {Lang::T('Created On')} <span class="float-end">{Lang::dateAndTimeFormat($package['recharged_on'],$package['recharged_time'])}</span>
                                    </li>
                                    <li class="list-group-item">
                                        {Lang::T('Expires On')} <span class="float-end">{Lang::dateAndTimeFormat($package['expiration'],$package['time'])}</span>
                                    </li>
                                    <li class="list-group-item">
                                        {$package['routers']} <span class="float-end">{$package['method']}</span>
                                    </li>
                                </ul>
                                <div class="mt-3 text-center">
                                    <a href="{$_url}customers/deactivate/{$d['id']}/{$package['plan_id']}&token={$csrf_token}" class="btn btn-danger me-2" onclick="return confirm('This will deactivate Customer Plan, and make it expired')">
                                        {Lang::T('Deactivate')}
                                    </a>
                                    <a href="{$_url}customers/recharge/{$d['id']}/{$package['plan_id']}&token={$csrf_token}" class="btn btn-success">
                                        {Lang::T('Recharge')}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-3 mb-3">
            <a href="{$_url}customers/list" class="btn btn-primary btn-block">{Lang::T('Back')}</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{$_url}customers/sync/{$d['id']}&token={$csrf_token}" onclick="return confirm('This will sync Customer to Mikrotik?')" class="btn btn-info btn-block">{Lang::T('Sync')}</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{$_url}message/send/{$d['id']}&token={$csrf_token}" class="btn btn-success btn-block">{Lang::T('Send Message')}</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{$_url}customers/login/{$d['id']}&token={$csrf_token}" target="_blank" class="btn btn-warning btn-block">{Lang::T('Login as Customer')}</a>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmModalLabel">{Lang::T('Confirm Deletion')}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {Lang::T('Are you sure you want to delete this user?')}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{Lang::T('Cancel')}</button>
                <a href="{$_url}customers/delete/{$d['id']}&token={$csrf_token}" class="btn btn-danger">{Lang::T('Delete')}</a>
            </div>
        </div>
    </div>
</div>

{if $d['coordinates']}
    {literal}
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
        <script>
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
                {/literal}setupMap({$d['coordinates']});{literal}
            });
        </script>
    {/literal}
{/if}

{include file="sections/footer.tpl"}