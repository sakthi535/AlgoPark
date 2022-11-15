<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .inputField{
            font-size: 16px;
            display: block;
            font-family: rubik,sans-serif;
            width: 100%;
            padding: 10px 1px;
            border: 0;
            border-bottom: 1px solid #747474;
            outline: none;
            -webkit-transition: all .2s;
            transition: all .2s;
        }

        .LoginForm{
            width: 600px;
            border: 5px solid #A66CFF;
            padding: 50px;
            margin: 20px auto;
            text-align: center;
            color: rgb(166, 108, 255);
            font-weight: 300;
            font-family: Rubik;
            
        }
        *{
            background-color: rgb(177, 225, 255);
        }

        button{
            width: 45%;
            border: 2px solid #A66CFF;
            padding: 18px;
            font-family: rubik,sans-serif;
            cursor: pointer;
            text-transform: uppercase;
            background: #A66CFF;
            color: #B1E1FF;
            
        }

        button:hover{
            border: 2px solid #A66CFF;
            background: #B1E1FF;
            color: #A66CFF;
        }

        p{
            font-size:20px;
        }
    </style>
    
		<div class="LoginForm">
			<h1 style="font-weight: 300;">
				Add Problem
			</h1>
			<p>
				Add DSA challenges from various platforms to practise.
			</p>

			<form action="submit.php" method="GET">
				<center>
					<table style="width: 60%;">

						<tr>
							<td>
								<input type="text" id = "name" name="problemName" placeholder="Enter Problem Name" class="inputField" size="20">
							</td>
						</tr>

						<tr>
							<td>
                                <input type="text" name="problemTopic" id = "topic" placeholder="Enter problem topic" class="inputField" size="25">
							</td>
						</tr>

                        <tr>
							<td>
								<input type="text" id = "link" name="link" placeholder="Enter Problem Link" class="inputField" size="20">
							</td>
						</tr>

						<tr>
							<td>
                                <input type="number" name="rating" id = "rating" placeholder="Enter difficulty" class="inputField" size="25">
							</td>
						</tr>
                        

						<br><br>

					</table>
				</center>

                <br><br>
				<button type="submit" value="Submit" name="Submit" class="Submit" > Submit </button>

			</form>
		</div>

</body>
</html>