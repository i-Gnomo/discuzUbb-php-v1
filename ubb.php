<?php
	function Ubbcode($strcontent){
		//demo
		// $patterns = array("/\[b\]/","/\[\/b\]/");
		// $replacer = array('<b>','</b>');
		// $strcontent = preg_replace($patterns[1], $replacer[1], $strcontent);
		
		//图片UBB
		$patterns = "/\[img\](http|https|ftp):\/\/(.[^\[]*)\[\/img\]/";
		$replacer = '<a onfocus="this.blur()" href="$1://$2" target="_blank"><img src="$1://$2" border="0" alt="按此在新窗口浏览图片" onload="javascript:if(this.width>screen.width-333)this.width=screen.width-333"></a>';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);

		//链接UBB
		$patterns = "/(\[url\])(.[^\[]*)(\[url\])/";
		$replacer = '<a href="$2" target="_blank">$2</a>';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);
		$patterns ="/\[url=(.[^\[]*)\]/";
		$replacer = '<a href="$1" target="_blank">';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);

		//邮箱UBB
		$patterns = "/(\[email\])(.*?)(\[\/email\])/";
		$replacer = '<img align="absmiddle" "src=images/email1.gif"><a href="mailto:$2">$2</a>';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);
		$patterns = "/\[email=(.[^\[]*)\]/";
		$replacer = '<img align="absmiddle" src="images/email1.gif"><a href="mailto:$1" target="_blank">';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);

		//QQ号码UBB
		$patterns = "/\[qq=([1-9]*)\]([1-9]*)\[\/qq\]/";
		$replacer = '<a target="_blank" href="tencent://message/?uin=$2&Site=www.52515.net&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=1:$2:$1" alt="点击这里给我发消息"></a>';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);
	    
	    //颜色UBB
		$patterns = "/\[color=(.[^\[]*)\]/";
		$replacer = '<font color="$1">';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);
		//文字字体UBB
		$patterns="/\[font=(.[^\[]*)\]/";
		$replacer = '<font face="$1">';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);
		//文字大小UBB
		$patterns="/\[size=([1-7])\]/";
		$replacer = '<font size="$1">';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);
		//文字对齐方式UBB
		$patterns="/\[align=(center|left|right)\]/";
		$replacer = '<div align="$1">';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);
		//表格UBB
		$patterns="/\[table=(.[^\[]*)\]/";
		$replacer = '<table width="$1">';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);

	    //FLASH动画UBB
		$patterns="/(\[flash\])(http:\/\/.[^\[]*(.swf))(\[\/flash\])/";
		$replacer = '<a href="$2" target="new"><img src="images/swf.gif" border="0" alt="点击开新窗口欣赏该flash动画!" height="16" width="16">[全屏欣赏]</a><br><center><object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,2,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="300" height="200"><param name="movie" value="$2"><param name="quality" value="high"><embed src="$2" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash" type="application/x-shockwave-flash" width="300" height="200">$2</embed></object></center>';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);
	    
		$patterns="/(\[flash=*([0-9]*),*([0-9]*)\])(http:\/\/.[^\[]*(.swf))(\[\/flash\])/";
		$replacer = '<a href="$4" target="new"><img src="images/swf.gif" border="0" alt="点击开新窗口欣赏该flash动画!" height="16" width="16">[全屏欣赏]</a><br><center><object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,2,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="$2" height="$3"><param name="movie" value="$4"><param name=quality value=high><embed src="$4" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash" type="application/x-shockwave-flash" width="$2" height="$3">$4</embed></object></center>';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);

	    //MEDIA PLAY播放UBB
		$patterns="/\[wmv\](.[^\[]*)\[\/wmv\]/";
		$replacer = 'object align="middle" classid="clsid:22d6f312-b0f6-11d0-94ab-0080c74c7e95" class="object" id="mediaplayer" width="300" height="200" ><param name="showstatusbar" value="-1"><param name="filename" value="$1"><embed type="application/x-oleobject" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#version=5,1,52,701" flename="mp" src="$1"  width="300" height="200"></embed></object>';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);

		$patterns="/\[wmv=*([0-9]*),*([0-9]*)\](.[^\[]*)\[\/wmv\]/";
		$replacer = '<object align="middle" classid="clsid:22d6f312-b0f6-11d0-94ab-0080c74c7e95" class="object" id="mediaplayer" width="$1" height="$2" ><param name="showstatusbar" value="-1"><param name="filename" value="$3"><embed type="application/x-oleobject" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#version=5,1,52,701" flename="mp" src="$3"  width="$1" height="$2"></embed></object>';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);
	    
		//REALPLAY 播放UBB
	    $patterns="/\[rm\](.[^\[]*)\[\/rm\]/";
	    $replacer = '(strcontent,"<object classid="clsid:cfcdaa03-8be4-11cf-b84b-0020afbbccfa" class="object" id="raocx" width="300" height="200"><param name="src" value="$1"><param name="console" value="clip1"><param name="controls" value="imagewindow"><param name="autostart" value="true"></object><br><object classid="clsid:cfcdaa03-8be4-11cf-b84b-0020afbbccfa" height="32" id="video2" width="300"><param name="src" value="$1"><param name="autostart" value="-1"><param name="controls" value="controlpanel"><param name="console" value="clip1"></object>';
	    $strcontent = preg_replace($patterns, $replacer, $strcontent);
		$patterns="/\[rm=*([0-9]*),*([0-9]*)\](.[^\[]*)\[\/rm\]/";
		$replacer = '<object classid="clsid:cfcdaa03-8be4-11cf-b84b-0020afbbccfa" class="object" id="raocx" width="$1" height="$2"><param name="src" value="$3"><param name="console" value="clip1"><param name="controls" value="imagewindow"><param name="autostart" value="true"></object><br><object classid="clsid:cfcdaa03-8be4-11cf-b84b-0020afbbccfa" height="32" id="video2" width="$1"><param name="src" value="$3"><param name="autostart" value="-1"><param name="controls" value="controlpanel"><param name="console" value="clip1"></object>';
		$strcontent = preg_replace($patterns, $replacer, $strcontent);


		$searcharray = array("/\[\/url\]/","/\[\/email\]/","/\[\/color\]/", "/\[\/size\]/", "/\[\/font\]/", "/\[\/align\]/", "/\[b\]/", "/\[\/b\]/","/\[i\]/", "/\[\/i\]/", "/\[u\]/", "/\[\/u\]/", "/\[list\]/", "/\[list=1\]/", "/\[list=a\]/","/\[list=A\]/", "/\[\*\]/", "/\[\/list\]/", "/\[indent\]/", "/\[\/indent\]/","/\[code\]/","/\[\/code\]/","/\[quote\]/","/\[\/quote\]/","/\[table\]/","/\[tr\]/","/\[td\]/","/\[\/tr\]/","/\[\/td\]/","/\[\/table\]/");
		$replacearray = array("</a>","</a>","</font>", "</font>", "</font>", "</div>", "<b>", "</b>", "<i>","</i>", "<u>", "</u>", "<ul>", "<ol type=1>", "<ol type=a>","<ol type=A>", "<li>", "</ul></ol>", "<blockquote>", "</blockquote>","<div><textarea name='codes' id='codes' rows='12' cols='65'>","</textarea><br/><input type='button' value='运行代码' onclick='RunCode()'> <input type='button' value='复制代码' onclick='CopyCode()'> <input type='button' value='另存代码' onclick='SaveCode()'> &nbsp;提示：您可以先修改部分代码再运行</div>","<div style='background:#E2F2FF;width:90%;height:300px;border:1px solid #3CAAEC'>","</div>","<table>","<tr>","<td>","</tr>","</td>","</table>");
	
		for($i=0;$i<count($searcharray);$i++){
			$strcontent = preg_replace($searcharray[$i], $replacearray[$i], $strcontent);
		}

		return $strcontent;
	}
?>