<div id="admin-help-controller-cms-content" class="cms-content center $BaseCSSClasses cms-tabset" data-layout-type="border"
     data-pjax-fragment="Content" data-ignore-tab-state="true">

    <div class="cms-content-header north">
        <div class="cms-content-header-info">
            <% include CMSBreadcrumbs %>
        </div>

        <% include AdminHelpTabs %>
    </div>

    <div class="cms-content-fields center ui-widget-content cms-panel-padded" data-layout-type="border">
        <div id="Form_EditForm"></div>
        <% include AdminHelpList %>
    </div>
</div>