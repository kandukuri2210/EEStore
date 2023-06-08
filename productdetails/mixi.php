<html>
    <head>
        <style>
            .one {
        width: 25px;
        height: 28px;
        object-fit: cover;
        border-radius: 50%;
        }
        .s1,.s3{
            background-color: bisque;
            margin:3px;
            padding:1em;
        }
        .s2{
            background-color: aliceblue;
            margin:3px;
            padding:1em;
            
        }
        .image{
            background-color: antiquewhite;
            margin:3px;
            padding:1em;
        }
        .loc{
            margin:5px;
            padding:2em;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .container{
            background-color: beige;
        }
        h1{
            text-align: center;
            color: brown;
        }
        .container,.image,.s1,.s2,.s3{
            border: 2px solid black;
        }
        .log{
            float:right;
        }
        .info{
            clear: right;
        }
        b{
            color:brown;
        }
        a{
            text-decoration: none;
            font-size: 20px;
        }
        a:hover{
            color:blueviolet;
        }
        a:active{
            color:red;
        }
        a:visited{
            color:purple;
        }
        </style>
    </head>
    <body>
        <h1><marquee>Welcome to Mixi repair Center</marquee></h1>
        <div class="container">
            <div class="image">
                <img class="loc" src="../images/grinder-service.jpg" alt="Maps nearby" width="90%"/>
            </div>
            <div class="s1">
                <a href="https://www.nobroker.in" title="Mixi Service" targrt="_top">Mixi Services</a>
                <p>A mixer is one of the common kitchen appliances. It is common that the mixer gives trouble quite often. Through our services we can shoot your troubles.</p>
                    <ul>
                        <li>Leakage of Jar</li>
                        <li>Keeps tripping</li>
                        <li>Slow movement of blades</li>
                        <li>Mixer is unable to start</li>
                        <li>Problem with switch or blade or motor</li>
                        <li>Mixer starts but won't grind</li>
                        <li>Noise generation in working mode</li>
                    </ul>  
                    <div>
                        <img class="log" src="../images/grinder-service.jpg" alt="company" width="100%" height="50%"/>
                    </div>
                    <p class="info">We avail these services with waranty and offer with discounts and we also have gift hampers. For any query contact <br> <img class="one" src="images/phone.jpg" alt="Contact"  float="left"><span style="font-size:15px;">8686585108</span></p>
            </div>
          <!----  <div class="s2">
                <a href="https://servicecentre.co/company/prestige-service-centre-kurnool-andhra-pradesh/" title="Prestige Appliances" targrt="_top">Prestige appliances under service in Kurnool|Andhra Pradesh</a>
                <p>Prestige store stove Repair & Services Customer care numbers in Kurnool. Find Prestige store stove authorized service center details in Kurnool. We provide all type of Kaff Gas stove works like
                    <ul>
                        <li>Prestige Induction Cook tops Service & repair in Kurnool</li>
                        <li>Prestige Induction Service & repair in Kurnool</li>
                        <li> Prestige Designer Chimney</li>
                        <li>Prestige Non-stick</li>
                        <li>Auto Ignition Stove</li>
                    </ul>  
                    <div>
                        <img class="log" src="images/prestige.jpg" alt="company" width="100%" height="50%"/>
                    </div>
                    <div><img class="one" src="images/phone.jpg" alt="Contact"  float="left"><span style="font-size:15px;">33441111</span>
                        <p class="info">
                            <b>Address:</b>Prestige Authorized Service Center, #40/88/B2, BSNL Office Road, Srinivasa Nagar,Kurnool - 518003, 
                            Kurnool Andhra Pradesh<br>
                            <b>Landmark:</b> BSNL Office Road<br>
                            <b>Email:</b> websitecustomer.support@prestigesmartkitchen.com<br>
                            <b>Opening Days:</b> Monday to Saturday<br>
                            <b>Open timings:</b> 10:00 am to 6:00 pm<br>
                        </p>
                    </div>
            </div>
            <div class="s3">
                <a href="https://www.sulekha.com/gas-stove-repair-services/kurnool" title="Top available services" target="_top">Top more service centers</a>
                <p>Common services rendered here are</p>
                <ul>
                    <li>Gas Stove Repair</li>
                    <li>Electric Chimney Repair</li>
                    <li>LPG Gas Pipe Line Installation Services</li>
                    <li>Stove/Hob Repair</li>
                    <li>Kitchen appliances & accessories dealers</li>
                </ul>
            </div>
        </div>--> 
        <!--<a href="heater.php">More</a>-->
        <table border=black style="padding:20px;margin-left:20px;margin-bottom:20px;margin-top:20px;">
            <tr>
            <th>Username</th>
            <th>Service Provider</th>
            <th>Product</th>
            <th>Rating(/5)</th>
            <th>Review</th>
            </tr>

        <?php 
        include "../conn.php";
        $sql="SELECT * from `reviews`";
        $query=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($query))
        {
            $uname=$row['uname'];
            $spname=$row['spname'];
            $arr=explode("-",$spname);
            $name=$arr[0];
            $prod=$arr[1];
            //echo $prod.' ';
            $rating=$row['rating'];
            $review=$row['review'];
            if($prod=='mixi')
            {
                echo "<tr><td>$uname</td>
                <td> $name</td>
                <td> $prod</td>
                <td> $rating</td>
                <td> $review</td>
                </tr>";
            }
        }
        ?>
        </table>
    </body>
</html>