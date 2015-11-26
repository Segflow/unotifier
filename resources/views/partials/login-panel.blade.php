<div id="loginbox">
    <div class="panel panel-primary" >
        <div class="panel-heading">
            <div class="panel-title">Log In</div>
        </div>
        <div style="padding-top:30px" class="panel-body" >            
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" required name="identifiant" value="" placeholder="Username">
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" required name="password" placeholder="Password">
                </div>
                
                
                <div class="input-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" value="1"> Remember me
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>