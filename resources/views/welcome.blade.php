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


header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

header h1 {
    margin: 0;
}

ul, li {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline-block;
    margin-right: 20px;
}

nav ul li:last-child {
    margin-right: 0;
}

nav a {
    color: #fff;
    text-decoration: none;
}



.parent-link{
    color:black;
}
.parent-link:hover {
            text-decoration: none;
        }

        .child-links {
            display: none;
        }
     

        
        .category-item {
            margin:1rem;
        }

        
        .child-links li::before {
            display: none;
        }
    h6{
        font-weight:bold;
    }

</style>
</head>
<body>
    <header>
        <h1>Simple Blog</h1>
        <nav>
        <!-- This is the navigation bar -->
        <ul>
            <!-- This is an unordered list of links -->
            <li>
            <!-- This is a link to the home page -->
            <a href="/category">Dashboard</a>
            </li>
            
            <!-- This is a link to the login page -->
            @if (auth()->user())
            <li>
                <a class="desktop-li" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-sign-out"></i> <span>{{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
         </li>
            @else
            <li>
                <a href="{{ route('login') }}">Login</a>
            <li>
            <li>
                <a href="{{ route('register') }}">Register</a>
            <li> 
            @endif
          
        </ul>
        </nav>
    </header>

    <main class="row">
        <section class="col-md-8 pt-3">
            @if(isset($main[0]))
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                       
                    {{$main}}<br><br><br>
                        @foreach ($main as $category)
                        <li class="category-item">
                            <a href="#" class="parent-link">{{ $category['name'] }}</a>
                            <ul class="child-links">
                                @foreach ($category['page_category'] as $pageCategory)
                                    <li><a href="{{ route('homepage', ['id' => $pageCategory['id']]) }}" class="no-underline nav-link">{{ $pageCategory['page']['title'] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                       
                    </div>
            @endif
            okoea now
        </section>
        <aside class="col-md-3 bg-light p-3">
            <h6>Categories and Pages </h6>
            eeqeq
            @if(isset($content)) 
                <ul class="no-bullets">
                    @foreach ($content as $category)
                        <li class="category-item">
                            <a href="#" class="parent-link">{{ $category['name'] }}</a>
                            <ul class="child-links">
                                @foreach ($category['page_category'] as $pageCategory)
                                    <li><a href="{{ route('homepage', ['id' => $pageCategory['id']]) }}" class="no-underline nav-link">{{ $pageCategory['page']['title'] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="alert alert-danger mt-3">No category.</div>
            @endif
        </aside>
    </main>

 
   




    


    <!-- Your existing footer and script

{{ route('page_category', ['id' => $pageCategory['id']])

-->
</body>
<script>
        $(document).ready(function () {
            // Show/hide child links on click
            $('.parent-link').on('click', function (e) {
                e.preventDefault();
                var childLinks = $(this).siblings('.child-links');
                $('.child-links').not(childLinks).hide();
                childLinks.toggle();
            });
        });
    </script>
</body>
</html>
