<% if HelpItem %>
	<div class="field admin-help-field" title="Help for &quot;$HelpItem.Title.XML&quot;">
	    <% if OpenInNewWindow %>
	    	<a href="$HelpLink" target="_blank">$HelpText</a>
	    	<a href="$HelpLink" target="_blank"><img src="adminhelp/images/help.png" alt="Help for &quot;$HelpItem.Title.XML&quot;"></a>
	    <% else %>
	    	<a class="admin-help-field-toggle" href="$HelpLink" target="_blank">$HelpText</a>
	    	<a class="admin-help-field-toggle" href="$HelpLink" target="_blank"><img src="adminhelp/images/help.png" alt="Help for &quot;$HelpItem.Title.XML&quot;"></a>
	    	<div class="admin-help-field-content admin-help-typography">
	    		<h2>$HelpItem.Title</h2>
	    		$HelpItem.Content
	    	</div>
	    <% end_if %>
	</div>
<% else %>
	<p class="message error">
		AdminHelp item with Unique Identifier "$UID" not found.
	</p>
<% end_if %>