<div class="cms-content cms-tabset center $BaseCSSClasses" data-layout-type="border" data-pjax-fragment="Content">

    <div class="cms-content-header north">
        <div class="cms-content-header-info">
            <h2>
                <% include CMSSectionIcon %>
                <% if $SectionTitle %>
                    $SectionTitle
                <% else %>
                    <% _t('ModelAdmin.Title', 'Data Models') %>
                <% end_if %>
            </h2>
        </div>

       <% include AdminHelpTabs %>

    </div>

    <div class="cms-content-fields center ui-widget-content" data-layout-type="border">
        $Tools
        $EditForm
    </div>

</div>
