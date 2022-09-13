<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <style type="text/css">

        #text{
            height: 25px;
            border-radius: 5px;
            padding:4px;
            border: solid thin #aaa;
            width:100%;
        }

        #button{
            padding: 10px;
            width: 100px;
            color: white;
            background-color:pink;
            border:none;
        }

        #box{
            background-color: rgb(107, 146, 170);
            margin: auto;
            width: 300px;
            padding: 20px;
        }
        
    </style>

    <div id="box">
        <form action="" method="post">
            <div style="font-size: 20px; margin:10px; color:white;"> Login to the website</div>

            <label for="Email"><strong>Emali</strong></label>  <input id="text" type="text" name="Email"><br><br>
            

            <label for="password"><strong>Password</strong></label>  <input id="text" type="password" name="password"><br><br>

            <input  id="button" type="submit" value="Login" name ="login"><br><br>

        </form>
    </div>
</body>
</html>