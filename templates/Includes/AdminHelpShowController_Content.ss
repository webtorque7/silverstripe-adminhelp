<div id="admin-help-controller-cms-content" class="cms-content center $BaseCSSClasses cms-tabset" data-layout-type="border"
     data-pjax-fragment="Content" data-ignore-tab-state="true">

    <div class="cms-content-header north">
        <div class="cms-content-header-info">
            <% include CMSBreadcrumbs %>
        </div>

        <% include AdminHelpTabs %>
    </div>

    <div class="cms-content-tools west cms-panel cms-panel-layout ui-widget">
        <div class="cms-panel-content">
            <% include AdminHelpList %>
        </div>
    </div>

    <div class="cms-edit-form cms-panel-padded center ui-tabs-panel ui-widget-content ui-corner-bottom" data-layout-type="border">
            <div id="Form_EditForm"></div>
            <% with $HelpItem %>
                <div class="admin-help-typography">
                    <h2>$Title</h2>
                    $Content
                </div>
            <% end_with %>

    </div>

    <div class="cms-content-actions cms-content-controls south">
        <% if $PreviousItem %>
            <% with $PreviousItem %>
                <a href="admin/admin-help/show/help/$ID" class="action ss-ui-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">Previous "$Title"</a>
            <% end_with %>
        <% end_if %>

        <% if $NextItem %>
            <% with $NextItem %>
                <a href="admin/admin-help/show/help/$ID" class="action admin-help-right-button ss-ui-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">Next "$Title"</a>
            <% end_with %>
        <% end_if %>
    </div>
</div>