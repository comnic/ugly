<script type="text/javascript" src="/static/lib/SE2.3/js/HuskyEZCreator.js" charset="utf-8"></script>
<div class="container">
<div calss="span1"></div>
<div class="span10">
	<form action="?" onsubmit="return chkSubmit();" method="post" enctype="multipart/form-data">
		<input type="hidden" name="bid" value="<?php echo($bid);?>">
		<input type="hidden" name="is_reply" value="<?php echo($is_reply);?>">
		<input type="hidden" name="parent" value="<?php echo($parent);?>">
		<input type="hidden" name="writer" value="comnic">
		<div class="span8">제목 : <input type="text" name="title" id="title" placeholder="제목을 입력하세요!"></div>
		<div class="span8">내용 : <textarea name="content" id="content" rows="10" cols="100" style="width:766px; height:412px; display:none;"></textarea></div>
		<div class="span8">파일 : <input type="file" name="attach_file"></div>
		<div class="span8" style="text-align: right"><input type="submit" value="쓰기" class="btn btn-primary"></div>
	</form>
<div class="span1"></div>

<script type="text/javascript">
var oEditors = [];

// 추가 글꼴 목록
//var aAdditionalFontSet = [["MS UI Gothic", "MS UI Gothic"], ["Comic Sans MS", "Comic Sans MS"],["TEST","TEST"]];

nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "content",
	sSkinURI: "/static/lib/SE2.3/SmartEditor2Skin.html",	
	htParams : {
		bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		//aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
		fOnBeforeUnload : function(){
			//alert("완료!");
		}
	}, //boolean
	fOnAppLoad : function(){
		//예제 코드
		//oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
	},
	fCreator: "createSEditor2"
});

function pasteHTML() {
	var sHTML = "<span style='color:#FF0000;'>이미지도 같은 방식으로 삽입합니다.<\/span>";
	oEditors.getById["content"].exec("PASTE_HTML", [sHTML]);
}

function showHTML() {
	var sHTML = oEditors.getById["content"].getIR();
	alert(sHTML);
}
	
function submitContents(elClickedObj) {
	oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
	
	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
	
	try {
		elClickedObj.form.submit();
	} catch(e) {}
}

function setDefaultFont() {
	var sDefaultFont = '궁서';
	var nFontSize = 24;
	oEditors.getById["content"].setDefaultFont(sDefaultFont, nFontSize);
}

function chkSubmit(){

	
	if($("#title").val() == ""){
		alert("제목을 입력하세요!");
		$("#title").focus();
		return false;
	}
	
	oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);
	
	if($("#content").val() == ""){
		alert("내용을 입력하세요!");
		//$("#content").focus();
		return false;
	}
	
	return true;
}
</script>
