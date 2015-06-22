<?php if( !empty($messages) ): ?>
    <div class="updated"="clear:both"><p><?php echo $messages; ?></p></div>
<?php endif; ?>

<br/>

<br/>

<div class="cminds_settings_description">

    <?php
// check permalink settings
    if( get_option('permalink_structure') == '' )
    {
        echo '<span style="color:red">Your WordPress Permalinks needs to be set to allow plugin to work correctly. Please Go to <a href="' . admin_url() . 'options-permalink.php" target="new">Settings->Permalinks</a> to set Permalinks to Post Name.</span><br><br>';
    }
    ?>

</div>

<?php
include plugin_dir_path(__FILE__) . '/call_to_action.phtml';
?>

<br/>
<div class="clear"></div>

<form method="post">
    <?php wp_nonce_field('update-options'); ?>
    <input type="hidden" name="action" value="update" />


    <div id="cmtoc_tabs" class="table-of-contentSettingsTabs">
        <div class="table_of_content_loading"></div>

        <?php
        CMTOC_Pro::renderSettingsTabsControls();

        CMTOC_Pro::renderSettingsTabs();
        ?>

        <div id="tabs-1">
            <div class="block">
                <h3>Display Settings</h3>
                <table class="floated-form-table form-table">
                    <tr valign="top">
                        <th scope="row">Only show <?php echo CMTOC_NAME ?> on single posts/pages (not Homepage, authors, category etc.)?</th>
                        <td>
                            <input type="hidden" name="cmtoc_table_of_contentsOnlySingle" value="0" />
                            <input type="checkbox" name="cmtoc_table_of_contentsOnlySingle" <?php checked(true, get_option('cmtoc_table_of_contentsOnlySingle')); ?> value="1" />
                        </td>
                        <td colspan="2" class="cmtoc_field_help_container">Select this option if you wish to only highlight <?php echo CMTOC_NAME ?> when viewing a single page/post.
                            This can be used so Tables of Content aren't displayed on your homepage, or author pages and other taxonomy related pages.</td>
                    </tr>
                </table>
                <div class="clear"></div>
            </div>
            <div class="block">
                <h3>Performance &amp; Debug</h3>
                <table class="floated-form-table form-table">
                    <tr valign="top">
                        <th scope="row">Only highlight on "main" WP query?</th>
                        <td>
                            <input type="hidden" name="cmtoc_table_of_contentOnMainQuery" value="0" />
                            <input type="checkbox" name="cmtoc_table_of_contentOnMainQuery" <?php checked(1, get_option('cmtoc_table_of_contentOnMainQuery')); ?> value="1" />
                        </td>
                        <td colspan="2" class="cmtoc_field_help_container">
                            <strong>Warning: Don't change this setting unless you know what you're doing</strong><br/>
                            Select this option if you wish to only highlight table-of-contents on main table-of-content query.
                            Unchecking this box may fix problems with highlighting table-of-contents on some themes which manipulate the WP_Query.</td>
                    </tr>
                </table>
                <div class="clear"></div>
            </div>
            <div class="block">
                <h3>Referrals</h3>
                <p>Refer new users to any of the CM Plugins and you'll receive a minimum of <strong>15%</strong> of their purchase! For more information please visit CM Plugins <a href="http://www.cminds.com/referral-program/" target="new">Affiliate page</a></p>
                <table>
                    <tr valign="top">
                        <th scope="row" valign="middle" align="left" >Enable referrals:</th>
                        <td>
                            <input type="hidden" name="cmtoc_table_of_contentReferral" value="0" />
                            <input type="checkbox" name="cmtoc_table_of_contentReferral" <?php checked(1, get_option('cmtoc_table_of_contentReferral')); ?> value="1" />
                        </td>
                        <td colspan="2" class="cmtoc_field_help_container">Enable referrals link at the bottom of the question and the answer page<br><br></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" valign="middle" align="left" ><?php CMTOC_Pro::_e('Affiliate Code'); ?>:</th>
                        <td>
                            <input type="text" name="cmtoc_table_of_contentAffiliateCode" value="<?php echo get_option('cmtoc_table_of_contentAffiliateCode'); ?>" placeholder="<?php CMTOC_Pro::_e('Affiliate Code'); ?>"/>
                        </td>
                        <td colspan="2" class="cmtoc_field_help_container"><?php CMTOC_Pro::_e('Please add your affiliate code in here.'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="tabs-2">
            <div class="block">
                <h3>Table of Contents - Labels</h3>
                <table class="floated-form-table form-table">
                    <tr valign="top">
                        <th scope="row">Header</th>
                        <td>
                            <input type="text" name="cmtoc_table_of_contentsHeaderDescription" value="<?php echo get_option('cmtoc_table_of_contentsHeaderDescription', 'Table Of Contents'); ?>" />
                        </td>
                        <td colspan="2" class="cmtoc_field_help_container">Set the label which appears above the Table of Contentss on the page.</td>
                    </tr>
                </table>
            </div>
            <div class="block">
                <h3>Table of Contents - Element Selector</h3>
                <table class="floated-form-table form-table">
                    <tr valign="top">
                        <th scope="row">Level 0:</th>
                        <td>
                            <span class="cmtoc_custom_selctors_label">Tag:</span><input type="text" name="cmtoc_table_of_contentsLevel0Tag" value="<?php echo get_option('cmtoc_table_of_contentsLevel0Tag'); ?>" />
                            <span class="cmtoc_custom_selctors_label">Class:</span><input type="text" name="cmtoc_table_of_contentsLevel0Class" value="<?php echo get_option('cmtoc_table_of_contentsLevel0Class'); ?>" />
                            <span class="cmtoc_custom_selctors_label">Id:</span><input type="text" name="cmtoc_table_of_contentsLevel0Id" value="<?php echo get_option('cmtoc_table_of_contentsLevel0Id'); ?>" />
                        <td colspan="2" class="cmtoc_field_help_container">Set the selector attributes for the 0-level table of content elements. Defaults to: h1</td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Level 1:</th>
                        <td>
                            <span class="cmtoc_custom_selctors_label">Tag:</span><input type="text" name="cmtoc_table_of_contentsLevel1Tag" value="<?php echo get_option('cmtoc_table_of_contentsLevel1Tag'); ?>" />
                            <span class="cmtoc_custom_selctors_label">Class:</span><input type="text" name="cmtoc_table_of_contentsLevel1Class" value="<?php echo get_option('cmtoc_table_of_contentsLevel1Class'); ?>" />
                            <span class="cmtoc_custom_selctors_label">Id:</span><input type="text" name="cmtoc_table_of_contentsLevel1Id" value="<?php echo get_option('cmtoc_table_of_contentsLevel1Id'); ?>" />
                        <td colspan="2" class="cmtoc_field_help_container">Set the selector attributes for the 1-level table of content elements. Defaults to: h2</td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Level 2:</th>
                        <td>
                            <span class="cmtoc_custom_selctors_label">Tag:</span><input type="text" name="cmtoc_table_of_contentsLevel2Tag" value="<?php echo get_option('cmtoc_table_of_contentsLevel2Tag'); ?>" />
                            <span class="cmtoc_custom_selctors_label">Class:</span><input type="text" name="cmtoc_table_of_contentsLevel2Class" value="<?php echo get_option('cmtoc_table_of_contentsLevel2Class'); ?>" />
                            <span class="cmtoc_custom_selctors_label">Id:</span><input type="text" name="cmtoc_table_of_contentsLevel2Id" value="<?php echo get_option('cmtoc_table_of_contentsLevel2Id'); ?>" />
                        <td colspan="2" class="cmtoc_field_help_container">Set the selector attributes for the 2-level table of content elements. Defaults to: h3</td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Level 3:</th>
                        <td>
                            <span class="cmtoc_custom_selctors_label">Tag:</span><input type="text" name="cmtoc_table_of_contentsLevel3Tag" value="<?php echo get_option('cmtoc_table_of_contentsLevel3Tag'); ?>" />
                            <span class="cmtoc_custom_selctors_label">Class:</span><input type="text" name="cmtoc_table_of_contentsLevel3Class" value="<?php echo get_option('cmtoc_table_of_contentsLevel3Class'); ?>" />
                            <span class="cmtoc_custom_selctors_label">Id:</span><input type="text" name="cmtoc_table_of_contentsLevel3Id" value="<?php echo get_option('cmtoc_table_of_contentsLevel3Id'); ?>" />
                        <td colspan="2" class="cmtoc_field_help_container">Set the selector attributes for the 3-level table of content elements. Defaults to: h4</td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Level 4:</th>
                        <td>
                            <span class="cmtoc_custom_selctors_label">Tag:</span><input type="text" name="cmtoc_table_of_contentsLevel4Tag" value="<?php echo get_option('cmtoc_table_of_contentsLevel4Tag'); ?>" />
                            <span class="cmtoc_custom_selctors_label">Class:</span><input type="text" name="cmtoc_table_of_contentsLevel4Class" value="<?php echo get_option('cmtoc_table_of_contentsLevel4Class'); ?>" />
                            <span class="cmtoc_custom_selctors_label">Id:</span><input type="text" name="cmtoc_table_of_contentsLevel4Id" value="<?php echo get_option('cmtoc_table_of_contentsLevel4Id'); ?>" />
                        <td colspan="2" class="cmtoc_field_help_container">Set the selector attributes for the 4-level table of content elements. Defaults to: h5</td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Level 5:</th>
                        <td>
                            <span class="cmtoc_custom_selctors_label">Tag:</span><input type="text" name="cmtoc_table_of_contentsLevel5Tag" value="<?php echo get_option('cmtoc_table_of_contentsLevel5Tag'); ?>" />
                            <span class="cmtoc_custom_selctors_label">Class:</span><input type="text" name="cmtoc_table_of_contentsLevel5Class" value="<?php echo get_option('cmtoc_table_of_contentsLevel5Class'); ?>" />
                            <span class="cmtoc_custom_selctors_label">Id:</span><input type="text" name="cmtoc_table_of_contentsLevel5Id" value="<?php echo get_option('cmtoc_table_of_contentsLevel5Id'); ?>" />
                        <td colspan="2" class="cmtoc_field_help_container">Set the selector attributes for the 5-level table of content elements. Defaults to: h6</td>
                    </tr>
                </table>
            </div>

            <?php
            $additionalFootnoteTabContent = apply_filters('cmtoc_settings_table_of_content_tab_content_after', '');
            echo $additionalFootnoteTabContent;
            ?>
        </div>
            <!-- Start Server information Module -->
            <div id="tabs-99">
                <div class='block'>
                    <h3>Server Information</h3>
                    <?php
                    $safe_mode = ini_get('safe_mode') ? ini_get('safe_mode') : 'Off';
                    $upload_max = ini_get('upload_max_filesize') ? ini_get('upload_max_filesize') : 'N/A';
                    $post_max = ini_get('post_max_size') ? ini_get('post_max_size') : 'N/A';
                    $memory_limit = ini_get('memory_limit') ? ini_get('memory_limit') : 'N/A';
                    $allow_url_fopen = ini_get('allow_url_fopen') ? ini_get('allow_url_fopen') : 'N/A';
                    $max_execution_time = ini_get('max_execution_time') !== FALSE ? ini_get('max_execution_time') : 'N/A';
                    $cURL = function_exists('curl_version') ? 'On' : 'Off';
                    $mb_support = function_exists('mb_strtolower') ? 'On' : 'Off';
                    $intl_support = extension_loaded('intl') ? 'On' : 'Off';

                    $php_info = cminds_parse_php_info();
                    ?>
                    <span class="description">
                        <?php echo CMTOC_NAME; ?> is a mix of  JavaScript application and a parsing engine.
                        This information is useful to check if <?php echo CMTOC_NAME; ?> might have some incompabilities with you server
                    </span>
                    <table class="form-table server-info-table">
                        <tr>
                            <td>PHP Version</td>
                            <td><?php echo phpversion(); ?></td>
                            <td><?php if( version_compare(phpversion(), '5.3.0', '<') ): ?><strong>Recommended 5.3 or higher</strong><?php else: ?><span>OK</span><?php endif; ?></td>
                        </tr>
                        <tr>
                            <td>mbstring support</td>
                            <td><?php echo $mb_support; ?></td>
                            <td><?php if( $mb_support == 'Off' ): ?>
                                    <strong>"mbstring" library is required for plugin to work.</strong>
                                <?php else: ?><span>OK</span><?php endif; ?></td>
                        </tr>
                        <tr>
                            <td>intl support</td>
                            <td><?php echo $intl_support; ?></td>
                            <td><?php if( $intl_support == 'Off' ): ?>
                                    <strong>"intl" library is required for proper sorting of accented characters on Table of Contents Index page.</strong>
                                <?php else: ?><span>OK</span><?php endif; ?></td>
                        </tr>
                        <tr>
                            <td>PHP Memory Limit</td>
                            <td><?php echo $memory_limit; ?></td>
                            <td><?php if( cminds_units2bytes($memory_limit) < 1024 * 1024 * 128 ): ?>
                                    <strong>This value can be too low for a site with big table-of-content.</strong>
                                <?php else: ?><span>OK</span><?php endif; ?></td>
                        </tr>
                        <tr>
                            <td>PHP Max Upload Size (Pro, Pro+, Ecommerce)</td>
                            <td><?php echo $upload_max; ?></td>
                            <td><?php if( cminds_units2bytes($upload_max) < 1024 * 1024 * 5 ): ?>
                                    <strong>This value can be too low to import large files.</strong>
                                <?php else: ?><span>OK</span><?php endif; ?></td>
                        </tr>
                        <tr>
                            <td>PHP Max Post Size (Pro, Pro+, Ecommerce)</td>
                            <td><?php echo $post_max; ?></td>
                            <td><?php if( cminds_units2bytes($post_max) < 1024 * 1024 * 5 ): ?>
                                    <strong>This value can be too low to import large files.</strong>
                                <?php else: ?><span>OK</span><?php endif; ?></td>
                        </tr>
                        <tr>
                            <td>PHP Max Execution Time </td>
                            <td><?php echo $max_execution_time; ?></td>
                            <td><?php if( $max_execution_time != 0 && $max_execution_time < 300 ): ?>
                                    <strong>This value can be too low for lengthy operations. We strongly suggest setting this value to at least 300 or 0 which is no limit.</strong>
                                <?php else: ?><span>OK</span><?php endif; ?></td>
                        </tr>
                        <tr>
                            <td>PHP cURL (Pro+, Ecommerce)</td>
                            <td><?php echo $cURL; ?></td>
                            <td><?php if( $cURL == 'Off' ): ?>
                                    <strong>cURL library is required to check if remote audio file exists.</strong>
                                <?php else: ?><span>OK</span><?php endif; ?></td>
                        </tr>
                        <tr>
                            <td>PHP allow_url_fopen (Pro+, Ecommerce)</td>
                            <td><?php echo $allow_url_fopen; ?></td>
                            <td><?php if( $allow_url_fopen == '0' ): ?>
                                    <strong>allow_url_fopen is required to connect to the Merriam-Webster and Wikipedia API.</strong>
                                <?php else: ?><span>OK</span><?php endif; ?></td>
                        </tr>

                        <?php
                        if( isset($php_info['gd']) && is_array($php_info['gd']) )
                        {
                            foreach($php_info['gd'] as $key => $val)
                            {
                                if( !preg_match('/(WBMP|XBM|Freetype|T1Lib)/i', $key) && $key != 'Directive' && $key != 'gd.jpeg_ignore_warning' )
                                {
                                    echo '<tr>';
                                    echo '<td>' . $key . '</td>';
                                    if( stripos($key, 'support') === false )
                                    {
                                        echo '<td>' . $val . '</td>';
                                    }
                                    else
                                    {
                                        echo '<td>enabled</td>';
                                    }
                                    echo '</tr>';
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <p class="submit"="clear:left">
            <input type="submit" class="button-primary" value="<?php CMTOC_Pro::_e('Save Changes') ?>" name="cmtoc_table_of_contentSave" />
        </p>
</form>