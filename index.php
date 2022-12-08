<?php
    include_once('header.php');
?>

<section>
<form>
    <label >Name:</label><input type="text" name = "name"id = "name"><br>
    <label >Password:</label><input type="password" name = "pass" id = "pass" ><br>
    <label >Message:</label><br><input type="text" name = "mes" id = "mes"><br>
</form>
<div id = 'output'></div><br>
</section>

<section>
<form>
    <label >Name:</label><input type="text" name = "name2"id = "name2"><br>
</form>
<label >Reply:</label><div class = "box"><p name = "rep" id = "rep"></p></div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        $("#mes").keyup(function(){
            $.ajax({
                type:"POST",
                url:"up.php", 
                dataType:"text", 
                data:{
                    name:$('#name').val(),
                    pass:$('#pass').val(),
                    mes:$('#mes').val(),
                },
                success:function(data){    
                $("#output").html(data);
                }
            });
        });
        setInterval(function() {
            $.ajax({
                type:"POST",
                url:"get.php", 
                dataType:"text", 
                data:{
                    name:$('#name2').val(),
                },
                success:function(data){    
                $("#rep").text(data);
                }
                
            });
        }, 1000 * 3);
    });
</script>

<?php
    include_once('footer.php');
?>