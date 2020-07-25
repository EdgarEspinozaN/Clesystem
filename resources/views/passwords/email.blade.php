<form class="" action="" method="post" novalidate>
    {{ csrf_field() }}
    <h2 class="text-center">E-MAil</h2>   
    <div class="form-group">
        <input type="e-mail" class="form-control" id="e-mail" name="e-mail" placeholder="Username" value="{{ old('e-mail') }}">
        
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <div class="input-group-prepend">
                <a class="btn btn-primary" onclick="verPass('password')"><i class="far fa-eye"></i></a>
            </div>
        </div>
        @error('password')
        <div class="" style="color: #EB0404;">
            {{$message}}
        </div>
        @enderror
        @error('username')
        <div class="" style="color: #EB0404;">
            {{$message}}
        </div>
        @enderror
    </div>        
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
    </div>
    <p><a href="">Lost your Password?</a></p>
</form>