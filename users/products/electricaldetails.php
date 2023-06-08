<?php
//background-color: #f5f8ff;->body
//color: #6759ff;->button-value
//color: #ffffff;->active
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <title>Electrical Details</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet"/>
        <style>
            *{
                padding:0;
                margin:0;
                box-sizing: border-box;
                border: none;
                outline: none;
                font-family: "Poppins",sans-serif;
            }
            body{
                
                background-color:#f5f8ff;
            }
            .wrapper{
                width:95%;
                margin:0 auto;
            }
            #search-container{
                margin:1em 0;
            }
            #search-container input{
                background-color: transparent;
                width:40%;
                border-bottom: 2px solid #110f29;
                padding:1em 0.3em;
            }
            #search-container input:focus{
                border-bottom-color:#6759ff ;
            }
            #search-container button{
                padding: 1em 2em;
                margin-left: 1em;
                background-color: #6759ff;
                color:#ffffff;
                border-radius: 5px;
                margin-top: 0.5em;
            }
            .button-value{
                border: 2px solid #6759ff;
                padding: 1em 2.2em;
                border-radius:3em;
                background-color: transparent;
                color:#6759ff;
                cursor: pointer;
            }
            .active{
                background-color: #6759ff;
                color:#ffffff;
            }
            #products{
                display:grid;
                grid-template-columns: auto auto auto;
                grid-column-gap: 1.5em;
                padding:2em 0;
            }
            .card{
                background-color: #ffffff;
                max-width: 18em;
                margin-top:1em;
                padding:1em;
                border-radius:5px;
                box-shadow: 1em 2em 2.5em rgba(1,2,68,0.08);
            }
            .image-container{
                text-align: center;
            }
            img{
                max-width: 100%;
                object-fit:contain;
                height: 15em;
            }
            .container{
                padding-top: 1em;
                color:#110f29;
            }
            .container h5{
                font-weight: 500;
            }
            .hide{
                display:none
            }
            @media screen and (max-width:720px){
                img{
                    max-width:100%;
                    object-fit: contain;
                    height:10em;
                }
                .card{
                    max-width:10em;
                    margin-top: 1em;
                }
                #products{
                    grid-template-columns: auto auto;
                    grid-column-gap: 1em;

                }
            }
        </style>
    </head>
    <body>
        <h6>The electrical services and search bar and each electrical gadget service centers are listed below.</h6>
        <div class="wrapper">
            <div id="search-container">
                <input type="search" id="search-input" placeholder="Search product name.."/>
                <button id="search" style="background-color:aliceblue; color:red;" onclick="func()">Search</button>
            </div>
            <div id="buttons">
                <button class="button-value" onclick="filterProduct('all')">All</button>
                <button class="button-value" onclick="filterProduct('Stove')">Stove</button>
                <button class="button-value" onclick="filterProduct('Bulb')">Bulb</button>
                <button class="button-value" onclick="filterProduct('Calculator')">Calculator</button>
                <button class="button-value" onclick="filterProduct('Mixi')">Mixi</button>
                <button class="button-value" onclick="filterProduct('Heater')">Heater</button>
            </div>
            <div id="products">
            </div>
        </div>
    </body>
    <script>
        let products={
            data:[
            {
            productName:"Induction Stove",
            category:"Stove",
            min_charge:"500",
            image:"../../images/stove.jpg",
            link:"../../servicedetails/stove.php",
            },
            {
            productName:"Bulbs",
            category:"Bulb",
            min_charge:"250",
            image:"../../images/bulbs.jpg",
            link:"../../servicedetails/bulb.php",
            },
            {
            productName:"Calculator",
            category:"Calculator",
            min_charge:"600",
            image:"../../images/calc.jpg",
            link:"../../servicedetails/calculator.php",
            },
            {
            productName:"Mixi",
            category:"Mixi",
            min_charge:"5000",
            image:"../../images/mixi.jpg",
            link:"../../servicedetails/mixi.php",
            },
            {
            productName:"Grinder",
            category:"Mixi",
            min_charge:"50000",
            image:"../../images/grinder.jpg",
            link:"../../servicedetails/grinder.php",
            },
            {
            productName:"Heater",
            category:"Heater",
            min_charge:"800",
            image:"../../images/heater.jpg",
            link:"../../servicedetails/heater.php",
            },
           ],
        };
        for(let i of products.data)
        {
            let card=document.createElement("div");
            card.classList.add("card",i.category,"hide");
            let imgContainer=document.createElement("div");
            imgContainer.classList.add("image-container");
            let image=document.createElement("img");
            image.setAttribute("src",i.image);
            imgContainer.appendChild(image);
            card.appendChild(imgContainer);
            let container=document.createElement("div");
            container.classList.add("container");
            let name=document.createElement("h5");
            name.classList.add("product-name");
            //name.classList.add("product-name");
            name.innerText=i.productName.toUpperCase();
            container.appendChild(name);
            card.appendChild(container);
            /*let price=document.createElement("h6");
            price.innerText="$" + i.min_charge;
            container.appendChild(price);
            card.appendChild(container);*/
            let a=document.createElement("a");
            let link=document.createTextNode("Service Providers");
            a.appendChild(link);
            a.title="For Details";
            a.href=i.link;
            a.target="_top";
            card.appendChild(a);
            document.getElementById("products").appendChild(card);
            /*let aContainer=document.createElement("div");
            aContainer.classList.add("a-container");
            let tag=document.createElement("a");
            tag.setAttribute("href",i.link);
            tag.setAttribute("alt","Click")
            aContainer.appendChild(tag);
            container.appendChild(aContainer);*/
        }
        function filterProduct(value){
            let buttons=document.querySelectorAll(".button-value");
            buttons.forEach(button=>{
                if(value.toUpperCase()==button.innerText.toUpperCase()){
                    button.classList.add("active");
                }
                else{
                    button.classList.remove("active");
                }
            });
            let elements=document.querySelectorAll(".card");
            elements.forEach((element)=>{
                if(value=="all"){
                    element.classList.remove("hide");
                }
                else{
                    if(element.classList.contains(value)){
                        element.classList.remove("hide");
                    }
                    else{
                        element.classList.add("hide");
                    }
                }
            });
        }
        //document.getElementById("search").addEventListener("click",()=>{
            function func(){
            let searchInput=document.getElementById("search-input").value;
            let elements=document.querySelectorAll(".product-name");
            let cards=document.querySelectorAll(".card");
            //console.log(searchInput);
            elements.forEach((element,index)=>{
                if(element.innerText.includes(searchInput.toUpperCase())){
                    cards[index].classList.remove("hide");
                }
                else{
                    cards[index].classList.add("hide");
                }
            });
        //});
            }
        window.onload=()=>{
            filterProduct("all");
        };
    </script>
</html>