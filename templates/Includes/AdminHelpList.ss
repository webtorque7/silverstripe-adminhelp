<ol class="admin-help-list">
    <% loop $RootHelpItems %>
        <li>
            <a href="admin/admin-help/show/help/$ID" <% if $Top.CurrentItem.ID == $ID %>class="current"<% end_if %>>$Title</a>
            <% if $Summary %>
                <div class="summary">$Summary</div>
            <% end_if %>
            <% if $Children %>
                <ol>
                    <% loop $Children %>
                        <li>
                            <a href="admin/admin-help/show/help/$ID" <% if $Top.CurrentItem.ID == $ID %>class="current"<% end_if %>>$Title</a>
                            <% if $Summary %>
                                <div class="summary">$Summary</div>
                            <% end_if %>
                        </li>
                    <% end_loop %>
                </ol>
            <% end_if %>
        </li>
    <% end_loop %>
</ol>