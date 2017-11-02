<!DOCTYPE html>
<html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ubb编辑器</title>
<meta name="keywords" content="ubb编辑器">
<meta name="description" content="ubb编辑器">
<meta name="generator" content="ubb编辑器">
<meta name="MSSmartTagsPreventParsing" content="TRUE">
<meta http-equiv="MSThemeCompatible" content="Yes">
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<?php
	ob_clean();
	$edithtml = '';
	require_once "ubb.php";
	$action = $_REQUEST['action'];
	if($action == 'add'){
		$content = htmlentities($_REQUEST['content']);
		$edithtml = Ubbcode($content);
	}
?>
<style type="text/css">
pre{
	width: 560px;
	padding: 20px;
	background-color: #e8e8e8;
	word-break: break-all;
	word-wrap: break-word;
}
code{
	font-family:Menlo,Monaco,Consolas,Courier New,monospace;
	white-space: pre-wrap;
}
</style>
</head>
<body>
	<pre><code><?php echo htmlspecialchars($edithtml); ?></code></pre>
	<div style="width:600px;">
		<form method="post" action="?action=add">
			<textarea name="content" cols="80" rows="2" style="display:none"></textarea>
			<iframe ID="Editor" name="Editor" src="edit.htm?id=content" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No" style="height:330px;width:100%"></iframe>
			<div align="center">
			  <input type="submit" value="添加内容"> 
			  &nbsp;
			  <input type="reset" value="重新填写">
			</div>
		</form>
	</div>
</body>
</html>
