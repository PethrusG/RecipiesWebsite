$(document).ready(function() {
    loadComments();
    var page = $("title").html();
    console.log("page is: " + page);

    function loadComments() {

	$.getJSON("get-current-user.php", function(getUser) {

	    var currentUser = getUser.user;
	    $.getJSON("retrieveCommentsJS.php", "page=" + page,
		      function(comments) {
		console.log(currentUser);
		var user;
		for(i = 0; i < comments.length; i++) {
		    user = comments[i].user;
		    $("#commentList").append("<h4>" + user + "</h4><br>" +
					    comments[i].comment);
		    if (user == currentUser) {
			$("#commentList").append(' <button class = "Delete" id = ' +
				comments[i].timestamp + '> Delete </button>');
		    }
		    console.log("user: " + user);
		}
	    });
	});
    }
    
    $("#submitComment").click(function() {
	$.post("addCommentJS.php", "comment=" + $("#comment").val()
	       + "&page=" + page );
	$("#comment").val("");
	$("#commentList").html("");
	loadComments();
    });

    // Using "delegated events" with on() to be able to use Delete-buttons added
    // after initial loading of document, with jQuery.
    $("#commentList").on("click", ".Delete", function() {
	console.log(this.id);
	$.post("delete-comment.php", "timestamp=" + this.id + "&page=" + page);
	$("#commentList").html("");
	loadComments();
    });
});
