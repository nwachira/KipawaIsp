{include file="customer/header-public.tpl"}

<div class="hidden-xs" style="height:100px"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4 class="h4">{Lang::T('Log in to Member Panel')}</h4>
                </div>
                <div class="card-body">
                    <form action="{$_url}login/post" method="post">
                        <input type="hidden" name="csrf_token" value="{$csrf_token}">
                        
                        <!-- Username / Email / Phone -->
                        <div class="form-group">
                            <label for="username" class="h5">
                                {if $_c['registration_username'] == 'phone'}
                                    {Lang::T('Phone Number')}
                                {elseif $_c['registration_username'] == 'email'}
                                    {Lang::T('Email')}
                                {else}
                                    {Lang::T('Usernames')}
                                {/if}
                            </label>
                            <div class="input-group">
                                {if $_c['registration_username'] == 'phone'}
                                    <span class="input-group-text" id="basic-addon1"><i class="glyphicon glyphicon-phone-alt"></i></span>
                                {elseif $_c['registration_username'] == 'email'}
                                    <span class="input-group-text" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                                {else}
                                    <span class="input-group-text" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                                {/if}
                                <input type="text" class="form-control form-control-lg" name="username" placeholder="{if $_c['country_code_phone'] != '' || $_c['registration_username'] == 'phone'}{$_c['country_code_phone']} {Lang::T('Phone Number')}{elseif $_c['registration_username'] == 'email'}{Lang::T('Email')}{else}{Lang::T('Usernames')}{/if}" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="h5">{Lang::T('Password')}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control form-control-lg" name="password" placeholder="{Lang::T('Password')}" required>
                            </div>
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="form-group d-flex justify-content-between align-items-center">
                            <div class="ui-checkbox">
                                <label>
                                    <input type="checkbox">
                                    <span class="h6">Remember me</span>
                                </label>
                            </div>
                            <a href="{$_url}forgot" class="text-decoration-none small">{Lang::T('Forgot Password')}?</a>
                        </div>

                        <!-- Buttons -->
                        <div class="form-group text-center">
                            {if $_c['disable_registration'] != 'noreg'}
                                <a href="{$_url}register" class="btn btn-success w-100 mb-2">{Lang::T('Register')}</a>
                            {/if}
                            <button type="submit" class="btn btn-primary w-100 btn-lg">{Lang::T('Login')}</button>
                        </div>

                        <!-- Privacy & Terms Links -->
                        <div class="text-center mt-3">
                            <a href="javascript:showPrivacy()" class="text-decoration-none small">Privacy</a> &bull;
                            <a href="javascript:showTaC()" class="text-decoration-none small">T &amp; C</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="HTMLModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="HTMLModal_konten"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>

{include file="customer/footer-public.tpl"}
