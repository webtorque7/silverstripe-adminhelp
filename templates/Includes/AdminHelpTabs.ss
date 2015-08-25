<div class="cms-content-header-tabs">
    <ul class="ccms-content-header-tabs cms-tabset-nav-primary ss-ui-tabs-nav">
        <li class="<% if $class == 'AdminHelpController' || $class == 'AdminHelpShowController' %> ui-tabs-active<% end_if %>">
            <a href="admin/admin-help/view" class="cms-panel-link" title="Form_EditForm" data-href="$LinkPageEdit">
                <% _t('AdminHelp.TabView', 'Help') %>
            </a>
        </li>
        <% if $MemberCanEdit %>
        <li class="<% if $class == 'AdminHelpModelAdmin' %> ui-tabs-active<% end_if %>">
            <a href="admin/admin-help/edit" class="cms-panel-link" title="Form_EditForm" data-href="$LinkPageSettings">
                <% _t('AdminHelp.TabEdit', 'Create/Edit') %>
            </a>
        </li>
        <% end_if %>
    </ul>
</div>