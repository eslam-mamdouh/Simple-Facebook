<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>{{ auth::user()->full_name() }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="/css/styles.css">
    </head>
    <body>

    <div class="container-fluid">
        <div class="row">

        
        <nav class="navbar navbar-inverse navbar-fixed-top bg-main header ">
            <div class="container header">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="images/logo.png" width="60px"></a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#"><span class="fa fa-user-plus"></span></a>
                        </li>
                        <li>
                            <a href="#" id="messages" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-html="true"><span class="fa fa-commenting"></span></a>
                        </li>
                        <li><a href="#" ><span class="fa fa-flash"></span></a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="fa fa-user"></span><span class="p-l-5">My Profile</span></a></li>
                                <li><a href="#"><span class="fa fa-gear"></span><span class="p-l-5">Settings</span></a></li>
                                <li><a href="#"><span class="fa fa-power-off"></span><span class="p-l-5">Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
   


                    <ul class="nav navbar-nav navbar-left">
                        <form class="navbar-form navbar-left">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </ul>
                </div>

            </div>
        </nav>

            <div class="container ">
                <div class="row">

                    <div class="col-xs-12 p-t-50">
                        <div style="position:relative;">                        
                            <img src="images/cover.png" width="100%" height="319px">

                            <h2 style="margin-left:200px;"><b>{{ auth::user()->full_name()}}</b></h2>
                            <div class="avatar" style="margin-bottom: 50px">
                                <div class="wrapper">
                                    <div>
                                        <img src="images/default.jpg" width="100%">
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <nav class="navbar navbar-default  m-b-15">
                                <div class="container-fluid">
                                    <ul class="nav navbar-nav" style="padding-left: 200px;">
                                        <li class="active"><a href="#"><b>Timeline</b></a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Friends</a></li>
                                        <li><a href="#">Photos</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <div class="col-xs-12 m-b-15">
                        <div class="col-xs-4 p-15 sub m-b-15" style="min-height:300px">
                        info
                        </div>
                        <div class="col-xs-8">

                            <div class="p-15 sub b-r-3 m-r--15 m-b-15 m-h-150">
                               <form action="/post" method="POST">
                                   {{csrf_field()}}
                                    <div class="form-group">
                                        <textarea rows="3" class="form-control" name="content" placeholder="What's on your mind ?"></textarea>
                                    </div>
                                    <div class="pull-right">
                                        <div class="form-group pull-left m-r-15">
                                            <select class="form-control b-r-3">
                                                <option value="public">Public</option>
                                                <option value="friends">Friends</option>
                                                <option value="except">Friends Except</option>
                                                <option value="specific">Specific Friends</option>
                                                <option value="onlyme">Only Me</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-left">Post</button>
                                    </div>

                                </form>
                            </div>

                            <?php 

                            foreach ($posts as $k => $v) {

                            ?>
                            
                            <div class="p-15 sub b-r-3 m-r--15 post">

                                <div class="media">
                                    <div class="media-left">
                                        <img src="images/default.jpg" class="media-object" width="35px">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading"><a href="#" class="co-main"><b>{{$v->user()->full_name()}}</b></a></h5>
                                        <div class="co-888 f-85">
                                            <div class="pull-left">
                                            	<a href="/post/show/{{ $v-> id }}" style="color:#888">
                                            		{{ $v->created_at }}
                                            	</a>
                                            </div>
                                            <div class="dropdown pull-left">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                <button class="btn post-btn"><span class="caret"></span></button>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="#">
                                                            <span class="fa fa-globe"></span>
                                                            <span class="p-l-5">Public</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="fa fa-users"></span>
                                                            <span class="p-l-5">Friends</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="fa fa-user-times"></span>
                                                            <span class="p-l-5">Friends Except</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="fa fa-user"></span>
                                                            <span class="p-l-5">Specific Friends</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="fa fa-unlock-alt"></span>
                                                            <span class="p-l-5">Only Me</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        {{ $v->content }}
                                    </div>
                                    <div class="post-footer">
                                        <span class="pointer">
                                            <span class="fa fa-thumbs-up"></span>
                                            <span>Like</span>
                                        </span>
                                        <span class="space-15"></span>
                                        <span class="pointer m-l-15">
                                            <span class="fa fa-comment"></span>
                                            <span>Comment</span>
                                        </span>
                                    </div>
                                    <div>
                                        <form>
                                            <textarea class="form-control" rows="1" placeholder="write a comemnt .."></textarea>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <?php
	                        }
	                        ?>

                        
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-3 col-md-4 chat" id="chat">

                        <div class="chat-options bg-main-2">
                            <span id="minimize" class="fa fa-window-minimize f-65 pointer"></span>
                        </div>

                        <div class="list-container">            
                            <div class="friends-list" id="friends-list">
                                
                                @foreach($friends as $k => $v)
                                <div class="media">
                                    <div class="media-left">
                                        <img src="images/default.jpg" class="media-object img-circle">
                                    </div>
                                    <div class="media-body">
                                        <p class="m-b-no">{{$v->full_name()}}</p>
                                        <span class="online"></span>
                                        <p class="m-b-no time">active 2 mins ago.</p>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                            <div class="search-box">
                                <span class="glyphicon glyphicon-search search-icon"></span>
                                <input class="form-control search-friend" placeholder="Search a friend...">
                            </div>

                        </div>
                    </div>
                    </div>
                </div>


        </div>
        </div>

        <script type="text/javascript">
            var str='<div class="media f-65"><div class="media-left"><img src="images/default.jpg" class="media-object" style="width:30px"></div><div class="media-body"><h5 class="media-heading m-b-no">Ahmed Hossam</h5><p class="f-85">Lorem ipsum...</p></div></div>'
            $('#messages').data('content',str.repeat(5));

            $('#minimize').click(function(){
                var el,x,y,m=' fa-window-minimize ',p=' fa-plus ',fa,fs=' f-1-1 ';
                el=$('#chat');
                x=el.css('height')=='525px'?60:525;
                el.css('height',x)
                y=x==525? 'block':'none';
                $('#friends-list').css('display',y);
                fa=x==525?m:p+fs;
                $(this).removeClass(p+m+fs).addClass(fa);                
            });

        </script>
        <script type="text/javascript" src="/js/scripts.js"></script>
    </body>
</html>




