<form name="uploadForm"  method="post" encType="multipart/form-data">
<input type="hidden" name="a" value="show">
<div class="upload_file">Upload XML report: <input type="file" size="32" name="report"></div>
<div class="">Upload XML Whitelist1: <input type="file" size="32" name="wl1"></div>
<div class="">Upload XML Whitelist2: <input type="file" size="32" name="wl2"></div>
<div class="">Upload XML Whitelist3: <input type="file" size="32" name="wl3"></div>
<div class="">Upload XML Whitelist4: <input type="file" size="32" name="wl4"></div>
<div class="">Upload XML Whitelist5: <input type="file" size="32" name="wl5"></div>
<div class="filter_group">
Whitelist by:  
<input type="radio" name="filter" value="0" checked> CRC
<input type="radio" name="filter" value="1"> Filename + Size
<input type="radio" name="filter" value="2"> Filename
</div>
<input type="submit" value="Analyze" class="startButton">
</form>