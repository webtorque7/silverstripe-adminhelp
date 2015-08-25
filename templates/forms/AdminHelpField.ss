<% if HelpItem %>
	<div class="field admin-help-field" title="Help for &quot;$HelpItem.Title.XML&quot;">
	    <a href="$HelpLink" target="_blank">$HelpText</a>
	    <a href="$HelpLink" target="_blank"><img src="adminhelp/images/help.png" alt="Help for &quot;$HelpItem.Title.XML&quot;"></a>
	</div>
<% else %>
	<p class="message error">
		AdminHelp item with Unique Identifier "$UID" not found.
	</p>
<% end_if %>