<?php
function litimgurls($imgid=0)
{
    global $lit_imglist,$dsql;
    //获取附加表
    $row = $dsql->GetOne("SELECT c.addtable FROM #@__archives AS a LEFT JOIN #@__channeltype AS c 
                                                            ON a.channel=c.id where a.id='$imgid'");
    $addtable = trim($row['addtable']);
    
    //获取图片附加表imgurls字段内容进行处理
    $row = $dsql->GetOne("Select imgurls From `$addtable` where aid='$imgid'");
    
    //调用inc_channel_unit.php中ChannelUnit类
    $ChannelUnit = new ChannelUnit(2,$imgid);
    
    //调用ChannelUnit类中GetlitImgLinks方法处理缩略图
    $lit_imglist = $ChannelUnit->GetlitImgLinks($row['imgurls']);
    
    //返回结果
    return $lit_imglist;
}

function getTypenameByTypeid($str){
		switch($str){
		case 2:
			return '健身世界';
			break;
		case 3:
			return '编程世界';
			break;
		case 4:
			return '减脂专栏';
			break;
		case 5:
			return '增肌专栏';
			break;
		case 6:
			return '程序员专栏';
			break;
		case 7:
			return 'php后端篇';
			break;
		case 8:
			return '实用工具篇';
			break;
		case 9:
			return '开发实战篇';
			break;
		case 10:
			return '特殊人群';
			break;
		case 11:
			return '其他语言篇';
			break;

	}
}