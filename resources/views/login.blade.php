<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="{{url('css/login.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
<style>
   
</style>


</head>
  <body>
        <div class="wrapper">
            <form action="" method="POST">
                @csrf  
                <div class="img">
                    <img class="img-login" src="image/logo.png" alt="image">
                </div>
                <p class="text"><center>Silahkan masuk dengan akun anda</center></p>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="input-box form-floating">
                    <input type="text" value="{{ old('personalnumber')}}" name="personalnumber" placeholder="personalnumber" class="form-control" id="floatinginput" ><span></span></input>
                    <i class="fa-solid fa-envelope"></i>
                    <label for="floatinginput" class="floating-label">Personal Number</label>
                </div>

                <div class="input-box form-floating">
                    <input type="password" class="form-control" id="password"  name="password" placeholder="password" ></input>
                    <i class="fa-solid fa-eye-slash" id="togglePassword"></i>
                    <label for="floatinginput"  class="floating-label">Password</label>
                </div>
                <!-- CAPTCHA -->
                {{-- <div class="input-box form-floating captcha-group mt-3">
                    <input type="text" name="captcha" class="form-control" id="captcha" placeholder="Enter CAPTCHA">
                    <div class="captcha-container mt-2">
                        <img src="{{ captcha_src() }}" alt="CAPTCHA" id="captchaImage">
                        <a href="#" onclick="refreshCaptcha()"><i class="ri-refresh-line"></i></a>
                    </div>
                    <label for="captcha" class="floating-label">Captcha</label>
                </div> --}}

                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>
    
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    function refreshCaptcha() {
    document.getElementById('captchaImage').src = '{{ captcha_src() }}?' + Math.random();
    }
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');

      togglePassword.addEventListener('click', function () {
          // Toggle the type attribute
          const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
          password.setAttribute('type', type);

          // Toggle the icon
          this.classList.toggle('fa-eye-slash');
          this.classList.toggle('fa-eye');
      });
  </script>
  </body>
</html>
