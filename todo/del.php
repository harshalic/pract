<html>
<head>
<title>(Type a title for your page here)</title>
<style type="text/css">
div {
position: absolute;
left: 100px;
top: 200px;
background-color: #f1f1f1;
width: 180px;
padding: 10px;
color: black;
border: #0000cc 2px dashed;
display: none;
}
</style>

<script language="JavaScript">
function setVisibility(id, visibility) {
document.getElementById(id).style.display = visibility;
}
</script>

</head>
<body >

<input type=button name=type value='Show Layer' onclick="setVisibility('sub3', 'inline');";>
<input type=button name=type value='Hide Layer' onclick="setVisibility('sub3', 'none');";> 

<div id="sub3">Message Box</div>

</body>
</html>