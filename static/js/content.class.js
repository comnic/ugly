// JavaScript Document
function Content(idx, cat, kind, title, summary, cnt, link) {
	this.idx = idx;
	this.category = cat;
    this.kind = kind;
    this.title = title;
    this.summary = summary;
    this.cnt = cnt;
    this.link = link;
    
    this.getTitle = function () {
		return this.title;
    }
}