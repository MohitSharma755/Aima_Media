 



function deletepost(postid) {
    $.post('index_postoperation.php', {
        postid: postid,
        action: "deletepost"
    }, function (data) {
        if (data == 1) {
            location.reload();
        }
        else if (data == 0) {

        }
        else {
            alert("some other data found");
        }
    });
} function sharepage() {
    alert('i am working share function');
    navigator.share({
        title: document.title,
        url: window.location.href
    });
}

// Comment function
function comment() {

    $.post('index_postopertaion.php', {
        action: "comment",
        userid: userid,
    },
        function (data2) {

            if (data2 == 1) {
                location.reload();
            }
            else if (data == 0) {

            }
            else {
                alert("some other data found");
            }
        }
    )
}
function index_comment(){
    // alert("i mworking");
    var input = document.createElement("input");
    input.type="text";
    // var content = document.createTextNode(a);
 
    document.getElementById("target_div").appendChild(input);
    // document.getElementById("target_div").style.display='block';
}
function alertt(){
    // console.log("Please Login");
    // document.write("hello");
    alert("please login");
    
}
