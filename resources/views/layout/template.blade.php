
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Dashbord</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/portal.css')}}">

</head> 

<body class="app">   	
<!--//app-header-->
<header class="app-header fixed-top">	
    @include('layout.header')
    @include('layout.sidebar')
</header>
@include('layout.content')
    


<div class="tab-content" id="orders-table-tab-content">
    @if (session('success'))
    <div class="alert alert-success alert-dismissable m-3">
        {{session('success')}}
    </div>

    @endif
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">id</th>
                                <th class="cell">Contenu</th>
                                <th class="cell">Titre</th>
                                <th class="cell">Date</th>
                                <th class="cell">Image</th>
                                <th class="cell">Categorie</th>
                                <th class="cell">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $articles as $art)
                                
                            <tr>
                                <td class="cell">{{$art->id}}</td>
                                <td class="cell"><span class="truncate">{{Str::limit(htmlspecialchars_decode(strip_tags($art->content)), 100)}}</span></td>
                                <td class="cell">{{$art->titre}}</td>
                                <td class="cell"><span>{{ date("d/m/Y", strtotime($art->created_at)) }}</span><br><span>{{ date("H:i:s", strtotime($art->created_at)) }}</span></td>
                                <td class="cell"> <img src="{{asset('images/'.$art->image)}}"  style="height: 90px; width: 90px;" ></td>
                                <td class="cell"><span class="badge bg-success">{{$art->categorie}}</span></td>
                                <td class="cell"><a class="btn app-btn-secondary" href="{{route('blog.edit', $art->id)}}">modifier</a>
                                    <form  class="d-inline" action="{{route('blog.destroy', $art->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn app-btn-secondary" href="{{route('blog.destroy', $art->id)}}">supprimer</button>
                                    
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                           
                        
                  
                            
                          
                        </tbody>
                    </table>
                </div><!--//table-responsive-->
               
            </div><!--//app-card-body-->		
        </div><!--//app-card-->
    {{-- <div class="app-wrapper">
	    <!--//app-content-->
	    
	    <footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		       
		    </div>
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->    					 --}}

 
    <!-- Javascript -->          
    <script src="{{asset('assets/plugins/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>  

    <!-- Charts JS -->
    <script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script> 
    <script src="{{asset('assets/js/index-charts.js')}}"></script> 
    
    <!-- Page Specific JS -->
    <script src="{{asset('assets/js/app.js')}}"></script> 
    
    

</body>
</html> 

