function submit(title, idea) {
	$("#allIdeas").append('<div id="ideaTitle">' + title + '</div>');
	$("#allIdeas").append('<div id="ideaContainer">' + idea + '</div>');
}