<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <style>
        body{
            background:ghostwhite;
            padding: 0;
            margin: 0;
            
        }
        .container{
            background: teal;
            border: 3px solid black;
            width: 100%;
            color: white;
        }
        .row1, .row2, .row7{
            text-align:center;
            

        }
        .row2{
            background:cyan;
            width:100%;
            height:60px;
            margin: 0 auto;
        }
        h2, h4{
            padding:15px;
            margin: 0 auto;
        }
        h3{
            padding:15px;
            color:black;
            margin:0 auto;
        }
        .row3{
            background: tel;
            border: 2px solid red;
        }
        .row5{
            background:green;
            border: 2px solid white;
            margin-left:10px;
            margin-right:10px;
            overflow: hidden;

        }
        .col1{
            width:40%;
            padding:10px;
            float: left;
            height: 115px;
            /* display:block; */
            /* justify-content: left; */
            /* overflow:left; */
        }
        .col2{
            width:50%;
            /* padding:10px; */
            float: left;
            /* overflow: hidden; */
            /* display:inline; */
        }
        .col1{
            border: 2px solid yellow;
            background: white;
        }
        .col2{
            background:yellow;
            margin-left:2px;
            /* border:2px solid black; */
            height: 115px;
        }
        p{
            padding:10px;
        }
        .row6{
            border: 3px solid white;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row row1">
            <h2>Heading Part</h2>
        </div>
        <div class="row row2">
            <h3>Menu Part</h3>
        </div>
        <div class="row row3">
            <div class="row row4">
                <div class="row row5">
                    <div class="col col1">
                        <h3>Left Content</h3>
                    </div>
                    <div class="col col2">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas beatae qui libero, dolorem fugit quia explicabo dolor expedita suscipit odit delectus impedit temporibus! Reprehenderit consequatur corrupti dolor enim ratione tempora labore autem, hvero blanditiis inventore ipsa necessitatibus pariatur reiciendis sapiente adipisci temporibus delectus asperiores odio itaque et nulla! Quas, modi.</p>
                    </div>
                </div>
                <div class="row row6">
                    <div class="col col3">
                        <p>div-1</p>
                    </div>
                    <div class="col col4">
                        <p>div-2</p>
                    </div>
                    <div class="col col5">
                        <p>div-3</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row7">
            <h4>Footer Part</h4>
        </div>
    </div>


</body>
</html>