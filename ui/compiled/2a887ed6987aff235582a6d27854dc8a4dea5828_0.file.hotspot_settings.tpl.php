<?php
/* Smarty version 4.5.3, created on 2025-01-17 12:30:44
  from '/home/wachira/Kipawa/system/plugin/ui/hotspot_settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_678a2344c52c42_54086412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a887ed6987aff235582a6d27854dc8a4dea5828' => 
    array (
      0 => '/home/wachira/Kipawa/system/plugin/ui/hotspot_settings.tpl',
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
function content_678a2344c52c42_54086412 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<section class="content-header">
    <h1>
        <div class="btn-group">
            <button type="button" class="btn btn-success">
                Hotspot Settings
            </button>
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/hotspot_settings"><?php echo Lang::T('General Settings');?>
</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/captive_portal_login" target="_blank">Preview Hotspot Login Page</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugin/hotspot_settings_download&download=1" target="_blank">Download Login Page</a>
                </li>
            </ul>
        </div>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Hotspot Settings</li>
    </ol>
</section>

<section class="content">
    <div class="table-responsive">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab"><?php echo Lang::T('General Settings');?>
</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1" style="overflow-x:auto;">
                    <div class="box-body no-padding" id="">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="hotspot_title">Hotspot Page Title</label>
                                    <input type="text" class="form-control" name="hotspot_title" id="hotspot_title"
                                        value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_title'];?>
" required>
                                    <small class="form-text text-muted">In this field, you can enter the name of your
                                        ISP company. It will appear as the main title on the hotspot page.</small>
                                </div>


                                <div class="form-group">
                                    <label for="hotspot_description">Brief Description Of Company/Tagline</label>
                                    <input type="text" class="form-control" name="hotspot_description"
                                        id="hotspot_description" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_description'];?>
" required>
                                </div>


                                <div class="form-group">
                                    <label for="hotspot_router_name">Router Name:</label>
                                    <input type="text" class="form-control" name="hotspot_router_name"
                                        id="hotspot_router_name" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_router_name'];?>
" required>
                                    <small class="form-text text-muted">This is the most important part of the form. Go
                                        to Network and then Routers, and copy the exact router name.</small>
                                </div>

                                <!-- FAQ fields -->
                                <div class="form-group">
                                    <label for="hotspot_faq_head1">FAQ Headline 1</label>
                                    <input type="text" class="form-control" name="hotspot_faq_head1"
                                        id="hotspot_faq_head1" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_faq_head1'];?>
" required>
                                </div>

                                <div class="form-group">
                                    <label for="hotspot_faq_answer1">FAQ Answer 1</label>
                                    <textarea class="form-control" id="hotspot_faq_answer1" name="hotspot_faq_answer1"
                                        required><?php echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_faq_answer1'];?>
</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="hotspot_faq_head2">FAQ Headline 2</label>
                                    <input type="text" class="form-control" id="hotspot_faq_head2"
                                        name="hotspot_faq_head2" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_faq_head2'];?>
" required>
                                </div>

                                <div class="form-group">
                                    <label for="hotspot_faq_answer2">FAQ Answer 2</label>
                                    <textarea class="form-control" id="hotspot_faq_answer2" name="hotspot_faq_answer2"
                                        required><?php echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_faq_answer2'];?>
</textarea>
                                </div>


                                <div class="form-group">
                                    <label for="hotspot_faq_head3">FAQ Headline 3</label>
                                    <input type="text" class="form-control" name="hotspot_faq_head3"
                                        id="hotspot_faq_head3" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_faq_head3'];?>
" required>
                                </div>
                                <div class="form-group">
                                    <label for="hotspot_faq_answer3">FAQ Answer 3</label>
                                    <textarea class="form-control" id="hotspot_faq_answer3" name="hotspot_faq_answer3"
                                        required><?php echo $_smarty_tpl->tpl_vars['_c']->value['hotspot_faq_answer3'];?>
</textarea>
                                </div>

                                <button type="submit" value="save" name="save" class="btn btn-info pull-right">Save
                                    Changes</button>

                            </div>
                        </form>
                    </div>
                </div>
                <div>
                    <pre><b>USAGE:</b>
                <br>Make sure you change this custom Settings and personalize them.
                <br>Then download the login.html by clicking on download login page.
                <br>Then upload the downloaded login.html file to your mikrotik router.
                <br>Make sure you add your website URL in mikrotik hotspot wall garden.
            </pre>
                </div>
</section>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
