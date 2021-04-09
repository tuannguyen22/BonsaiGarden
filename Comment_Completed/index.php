<html>

<head>
<link rel="stylesheet" href="index.css">
<title>Comment</title>
<script src="jquery-3.2.1.min.js"></script>

<body>
    <h1>Comment</h1>
    <div class="comment-form-container">
        <form id="frm-comment">
            <div class="input-row">
                <input type="hidden" name="comment_id" id="commentId" placeholder="Name" /> 
                <input class="input-field" type="text" name="name" id="name" placeholder="Name" required/>
            </div>
            <div class="input-row">
                <textarea class="input-field" type="text" name="comment" id="comment" placeholder="Add a Comment" required>  </textarea>
            </div>
            <div>
                <input type="button" name='add' class="btn-submit" id="submitButton" value="Post" /><div id="comment-message">Comments Added Successfully!</div>
            </div>

        </form>
    </div>
    </div>
    <div id="output"></div>
    <script>
            function postReply(commentId) {
                $('#commentId').val(commentId);
                $("#name").focus();
            }

            $("#submitButton").click(function () {
                   $("#comment-message").css('display', 'none');
                var str = $("#frm-comment").serialize();

                $.ajax({
                    url: "add_comment.php",
                    data: str,
                    type: 'post',
                    success: function (response)
                    {
                        var result = eval('(' + response + ')');
                        if (response)
                        {
                            $("#comment-message").css('display', 'inline-block');
                            $("#name").val("");
                            $("#comment").val("");
                            $("#commentId").val("");
                           listComment();
                        } else
                        {
                            alert("Failed to add comments !");
                            return false;
                        }
                    }
                });
            });
         
        </script>
</body>

</html>