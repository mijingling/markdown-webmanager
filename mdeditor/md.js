var testEditor;
var _id;
var _title;
var _content;
$(function() {
	_content=document.getElementById("content").value;
	testEditor=editormd("test-editormd", {
		width: "90%",
        height: 740,
        path : './lib/',
        markdown : _content,
		codeMirror:false,
        codeFold : true,
        saveHTMLToTextarea : true,    // 保存HTML到Textarea
        searchReplace : true,
        taskList : true,
        tocm: true,         // Using [TOCM]
        tex : true,                   // 开启科学公式TeX语言支持，默认关闭
        flowChart : true,             // 开启流程图支持，默认关闭
        sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
        imageUpload : true,
        imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
        imageUploadURL : "./upload-php/upload.php",
		toolbarIcons : function(){
			return ["undo","redo","|","bold","del","italic","quote","uppercase","|","h1","h2","h3","list-ul","list-ol","hr","|","link","reference-link","image","code","preformatted-text","code-block","table","datetime","html-entities","pagebreak","|","goto-line","watch","preview","search","fullscreen","save","|","help","info"]
		},
		toolbarIconsClass : {
			save : "fa-floppy-o"  // 指定一个FontAawsome的图标类
		},
		lang : {
			toolbar : {
				save : "保存(按Ctrl+S)"
			}
		},
		toolbarHandlers : {
			save : function(cm,icon,cursor,selection){
				setContent();
			}
		},
        onload : function() {														
			 var keyMap = {
				"Ctrl-S": function(cm) {
					setContent();
				}
			};
			this.addKeyMap(keyMap);
			//如果perview为1，则设置为预览模式
			var _preview =request('preview');
			if(_preview==1){
				setPreview();
			}
        }
    });
});
function setPreview(){
	testEditor.previewing();
}
function setContent(){
	_id=document.getElementById("id").value;
	_title=document.getElementById("title").value;
	_content=testEditor.getMarkdown();
	if(ckEmpty(_title)){
		alert("标题不可为空!");
    }else{
    	$.post("../save.php",{id:_id,title:_title,content:_content},
           function(data,state){
            if(state=="success"){
                alert("保存成功!");
                if(ckEmpty(_id)){
                   //跳转到相应编辑页面
                   location.href="md.php?id="+data;
               }
            }
         },"text");
    };
}
//判断字符串是否为空
function ckEmpty(param){
	//匹配首尾空格的正则表达式：(^\s*)|(\s*$)
	var emstr=(param.replace(/(^\s*)|(\s*$)/g,"")=="");
    var rs=(param==null||typeof(param)=="undefined"||emstr);
	return rs;
}
function request(paras){ 
	var url = location.href;  
	var paraString = url.substring(url.indexOf("?")+1,url.length).split("&");  
	var paraObj = {}  
	for (i=0; j=paraString[i]; i++){  
		paraObj[j.substring(0,j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=")+1,j.length);  
	}  
	var returnValue = paraObj[paras.toLowerCase()];  
	if(typeof(returnValue)=="undefined"){  
		return "";  
	}else{  
		return returnValue;  
	}  
}