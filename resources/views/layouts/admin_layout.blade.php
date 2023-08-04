<!DOCTYPE html>
<html lang="en">
  <head>
       <meta charset=UTF-8>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CMS</title>

        <!-- Fonts -->
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        
        <style>
        *{
            margin:0;
            padding:0;
            list-style-type:none;
        }
        ul{
            padding:0;
            margin:0;
        }
        .logo{
            height:70px;
        }
        a {
            text-decoration:none !important;
        }
            body{
              
                
                display:grid;
                grid-template-rows:min-content, 1fr;
                grid-template-columns:auto;
                background:rgb(240,242,245);
			    position:relative;
               
                
            }
            nav .fa-solid{
                color:white;
             }
             nav{
                background:#3B82F6;
                padding:2px 1em;
                
             }
            nav ul {
                display: flex;
                align-items: baseline;
                justify-content: space-between;
            }

            nav .mobile {
                margin-left:30px;
            }
            nav li:last-child {
                margin-left: auto;
            }
          
            aside{
                display:none;
            }
            aside{
                position:absolute;
                background:white;
                min-height:100vh;
                /*
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);*/
                width:auto;
                left:0px;
                z-index:2;
                padding:1em 2em;
               
            
             }
             aside li{
                 padding-top:1.3em;
            }
            aside .fa-solid{
                color:blue;
                padding-right:0.3em;
               
             }
           section{
          
            overflow-x:hidden;
            padding-left:15em;
            padding-right:2em;
            padding-top:1em;
           }
            button{
                margin:1em 0;
            }
            label{
                font-weight:bold;
             
            }
            @media (min-width:900px)  {
                aside{
                    display:block;
                 } 
               
            }
        </style>
    </head>
    <body>
            <aside>
                <div style="text-align:center" ><img src="{{asset('images/logo.jpg')}}" class="logo"/></div>
                <ul>
                  
                    <li><i class="fa-solid fa-bar-chart"></i><a href="/category">Category</a></li>
                    <li><i class="fa-solid fa-book"></i><a href="/pages">Create Page</a></li>
                    <li><i class="fa-solid fa-upload"></i><a href="/page_category">Page Category</a></li>
                    
                    
                 </ul>
            </aside>
            <main>
                <nav>
                    
                    <ul>
                     
                        <li>
                           <img src="{{asset('images/logo.jpg')}}" class="logo"/>
                            
                        </li>
                        
                        <li><i class="fa-solid fa-bars mobile" id="mobile_bar"></i></li>
                      
                        
        
                        
                    </ul>
            
                </nav>
                <section id="content">
                @if (Session::has('success'))
                    
					<div class="alert alert-success">{{ Session::get('success') }}</div>
				@elseif(Session::has('error'))
                     <div class="alert alert-danger">{{ Session::get('error') }}</div>
				@endif
                     @yield('content')
                </section>
            </main>
    </body>
    <script>
        $(document).ready(function() {
       

            $("#mobile_bar").click(function(e) {
               
                if ($("aside").css("display") == "none") {
                 $("aside").css("display", "block");
                 $("#content").css("padding-left", "15em");
            } else {
                $("aside").css("display", "none");
                $("#content").css("padding-left", "2em");
            }
            
            });

        
        });
    </script>
   
</html>