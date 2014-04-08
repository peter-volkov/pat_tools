<div style="width:500px; float:left;">
<h2>{PS_TITLE_VIEW}</h2>
<form name="uploadForm"  method="post" encType="multipart/form-data">
<input type="hidden" name="a" value="show">
<div class="upload_file">{PS_UPLOAD_XML_REPORT}: <input type="file" size="32" name="report"></div>
<div class="">{PS_UPLOAD_XML_WHITELIST}1: <input type="file" size="32" name="wl1"></div>
<div class="">{PS_UPLOAD_XML_WHITELIST}2: <input type="file" size="32" name="wl2"></div>
<div class="">{PS_UPLOAD_XML_WHITELIST}3: <input type="file" size="32" name="wl3"></div>
<div class="">{PS_UPLOAD_XML_WHITELIST}4: <input type="file" size="32" name="wl4"></div>
<div class="">{PS_UPLOAD_XML_WHITELIST}5: <input type="file" size="32" name="wl5"></div>
<div class="filter_group">
{PS_WHITELIST_BY}:  
<input type="radio" name="filter" value="0" checked> {PS_CRC}
<input type="radio" name="filter" value="1"> {PS_FILENAME_CRC}
<input type="radio" name="filter" value="2"> {PS_FILENAME}
</div>
<input type="submit" value="{PS_ANALYZE_BUTTON}" class="startButton">
</form>
</div>

<div style="margin-left: 50px;">
<h2>{PS_TITLE_COMPARE}</h2>
<form name="compareForm"  method="post" encType="multipart/form-data">
<input type="hidden" name="a" value="compare">
<div class="upload_file">{PS_UPLOAD_XML_REPORT} 1: <input type="file" size="32" name="report1"> <br/>
{PS_UPLOAD_XML_REPORT} 2: <input type="file" size="32" name="report2"></div>

<div class="filter_group">
{PS_COMPARE_BY}:  
<input type="radio" name="filter" value="0" checked> {PS_FILESIZE}
<input type="radio" name="filter" value="1"> {PS_CRC}
<input type="radio" name="filter" value="2"> {PS_OWNER}
<input type="radio" name="filter" value="3"> {PS_MTIME}
</div>
<input type="submit" value="{PS_ANALYZE_BUTTON}" class="startButton">
</form>
</div>