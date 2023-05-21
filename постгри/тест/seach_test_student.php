<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
        <link href="./css/main.css" rel="stylesheet" />
        <title>Document</title>
        <style>
        * {
  box-sizing: border-box;
}
body {
  font-size: 14px;
}
.v1_167 {
  width: 100%;
  height: 726px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 0px;
  overflow: hidden;
}
.v1_168 {
  width: 100%;
  height: 726px;
  background: url("../images/v1_168.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 5px;
  left: 0px;
  overflow: hidden;
}
.v1_169 {
  width: 681px;
  height: 423px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 188px;
  left: 419px;
  border-top-left-radius: 30px;
  border-top-right-radius: 30px;
  border-bottom-left-radius: 30px;
  border-bottom-right-radius: 30px;
  overflow: hidden;
}
.v1_170 {
  width: 357px;
  height: 57px;
  background: rgba(192,192,192,1);
  opacity: 1;
  position: absolute;
  top: 354px;
  left:587px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  overflow: hidden;
}

.v1_172 {
  width:276px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 259px;
  left: 635px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 35px;
  opacity: 1;
  text-align: left;
    text-align: center;
}
.v1_174 {
  width: 324px;
  height: 168px;
  background: url("../images/v1_174.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 91px;
  left: 605px;
  overflow: hidden;
}
.v1_175 {
  width: 179px;
  height: 80px;
  background: rgba(19,21,87,1);
  opacity: 1;
  position: absolute;
  top: 503px;
  left: 670px;
    border-radius: 20px;
}
.v1_176 {
  position: absolute;
width: 180px;
height: 82px;
left: calc(50% - 183px/2 - 110px);
top: 503px;
left: 669px;
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 35px;
line-height: 39px;    
align-items: center;
text-align: center;
text-transform: capitalize;
color: #CACACA;
background: rgba( 0,0,0,0);
border-radius: 22px;
}
.v1_177 {
  width: 156px;
  height: 61px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 62px;
  left: 62px;
    border-radius: 20px;
}
.v1_178 {
  width: 156px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 72px;
  left: 62px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 30px;
  opacity: 1;
  text-align: center;
    text-decoration: none;
}
input{
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 30px;
text-align: center;
}
            
.inp_up{  
position: absolute;
top:353px;
left: 587px;
}
        </style>
    </head>
    <body>
        <div class="v1_167">
            <div class="v1_168"></div>
            <div class="v1_169"></div>
            <div class="v1_170"></div>
            <span class="v1_172">Название теста:</span>
            <div class="v1_174"></div>
            <div class="v1_175"></div>
            <form method="get" action="counter.php">
    <div class="inp_up">
        <input style="border-radius: 18px; width: 356px; height: 58px; background: transparent; border: none;" type="text" id="testName1" name="testName" required><br><br>
    </div>
    <input type="submit" class="v1_176" value="Поиск">
</form>

<form method="get" action="testing1.php">
    <div class="inp_up">
        <input style="border-radius: 18px; width: 356px; height: 58px; background: transparent; border: none;" type="text" id="testName" name="testName" required><br><br>
    </div>
    <input type="submit" class="v1_176" value="Поиск">
</form>
            <div class="v1_177"></div>
            <a href="/PD/постгри/ЛК/index_lk_student.php" class="v1_178">Выход</a>
        </div>
    </body>
</html>