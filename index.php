<!DOCTYPE html>
    <head>
        <title>Data class in php</title>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

       <style>
          
          .background{
          background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(D.jpg);
          background-size:cover;
          height: 100vh;
    width: 100%;
          }
           .title{
               height: 100px;
               padding-top: 20px;
               border-radius: 0px;
               
               text-align:center;
               font-family:Vollkorn;
            }
         
            .container{
                align-items: center;
               justify-items:center;
                padding: 40px;
                margin-top: -30px;
            }
            #table{
               
                font-family:Dosis;
                font-size:1.5vw;
                border:solid;
                border:1px solid black;
                color:red;
            }
            .table tr{
              border:1px solid black;
              padding:2px;
              
            }
            .table td{
              border:1px solid black;
              padding:2px;
              
            }
            .table th{
              border:1px solid black;
              padding:2px;
              
            }
            
            .cont{
                padding-top: 0px;
                margin-top: -10px;
                text-align: center;
                font-family:Playfair Display;
                color:lightblue;
            }
            
                footer{
                
                position: fixed;
                left: 0;
                height: 10%;
                bottom: 0px;
                width: 100%;
                
               
                text-align: center;
                font-family:Berlin sans fb;
                }
                
                
       </style>
    </head>
    <body>
    <div class="background">
        <div class="title"><h1 style="color: white;">Hotel RADISON<br>Menu Card</h1></div>
        
         <div class="cont">
            <h1>Select the menu item to see various dishes</h1>
          </div>
          
          <div class="container">
            <select name="item restaurant-dropdown restaurant" class="custom-select custom-select-lg mb-3" id="restaurant" style="width:100%;height:40px">
              <option value="">Select Menu                                                                                                          </option>
          </select>
          <br>
        
          <table id="table" class="table table-hover">
            <tr>
              <th>Name</th>
              <td id="menuname"></td>
            </tr>
            <tr>
              <th>ID</th>
              <td id="id"></td>
            </tr>
            <tr>
              <th>Short Name</th>
              <td id="sname"></td>
            </tr>
            <tr>
              <th>Description</th>
              <td id="descp"></td>
            </tr>
            <tr>
              <th>Price Small</th>
              <td id="psmall"></td>
            </tr>
            <tr>
              <th>Price Large</th>
              <td id="plarge"></td>
            </tr>
            <tr>
              <th>Small Portion Name</th>
              <td id="spname"></td>
            </tr>
            <tr>
              <th>Large Portion Name</th>
              <td id="lpname"></td>
            </tr>
          </table>
        
      
          </div>
        </div>
       
        
        
        <footer>
            <!-- <div class="footer1">
                <div class="container-fluid"> -->
                    <p style="color: white;">&copy; Copyright 2020</p>
                    <a href="mailto:tejasshelar004@gmail.com">tejasshelar004@gmail.com</a></p>
                    <!-- </div>
              </div> -->
        </footer>
            
        <script src="jquery-3.5.1.min.js"></script>
        <script>
        let base_url = "details.php";
        $("document").ready(function(){
            getRestaurantMenuList();
            document.querySelector("#restaurant").addEventListener("change",getMenuItemList);
        });
        function getRestaurantMenuList() {
            let url = base_url + "?req=menu_name_list";
            $.get(url,function(data,success){
                for (const key in data) {
                let opt = document.createElement("option");
                opt.textContent = data[key].name;
                opt.value = data[key].name; 
                document.querySelector('#restaurant').appendChild(opt);
            }
            });
        }
        
            function getMenuItemList(i)
            {
                
                let index=i.target.value;
                
                console.log(index);
                let url=base_url + "?req=menuName&name="+index;
                $.get(url,function(data,success){
                    
                        
                        if(data != null){
                        let x = data;
                        let pricesmall = x.price_small;
                        
                        if(pricesmall == null){
                            pricesmall = "Not available";
                        }
                        let descrp = x.description;
                        if(descrp == ""){
                            descrp = "Description not available";
                        }
                        let smallpname = x.small_portion_name;
                        if(smallpname == null)
                        {
                            smallpname = "Not Available";
                        }
                        let largepname = x.large_portion_name;
                        if(largepname == null)
                        {
                            largepname = "Not Available";
                        }
                        document.querySelector("#menuname").textContent = x.name;
                        document.querySelector("#id").textContent = x.id;
                        document.querySelector("#sname").textContent = x.short_name;
                        document.querySelector("#descp").textContent = descrp;
                        document.querySelector("#psmall").textContent = pricesmall;
                        document.querySelector("#plarge").textContent = x.price_large;
                        document.querySelector("#spname").textContent = smallpname;
                        document.querySelector("#lpname").textContent = largepname;
                    }
                    document.getElementById("table").style.display = "block";
                });
                
            }
    </script>
        
    </body>
</html>