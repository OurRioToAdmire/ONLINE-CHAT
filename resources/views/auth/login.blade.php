<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login</title>

<style>
body{
  margin:0;
  padding:0;
  background:black;
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  overflow:hidden;
  font-family: 'Impact', sans-serif;
  color:white;
}

.crt-container{
  width: 90vw;
  max-width: 900px;
  aspect-ratio: 4 / 3;
  background:black;
  position:relative;
  border-radius:40px;
  overflow:hidden;
  box-shadow:
    0 0 60px rgba(255,0,0,0.4),
    0 0 120px rgba(255,0,0,0.2) inset;
  transform: perspective(900px) rotateX(4deg) scale(1);
}

.crt-container::before{
  content:"";
  position:absolute;
  inset:0;
  background:radial-gradient(circle at center, rgba(255,255,255,0.07), rgba(0,0,0,0.8) 70%);
  pointer-events:none;
  mix-blend-mode:overlay;
}

.crt-noise{
  position:absolute;
  inset:0;
  background: url('/images/royalvhs.gif');
  background-size: cover;
  opacity: 0.17;
  mix-blend-mode: screen;
  pointer-events: none;
}

.scanlines{
  position:absolute;
  inset:0;
  background: repeating-linear-gradient(
    to bottom,
    rgba(0,0,0,0) 0px,
    rgba(0,0,0,0) 2px,
    rgba(0,0,0,0.15) 3px
  );
  pointer-events:none;
  opacity:0.4;
}

.crt-aberration{
  position:absolute;
  inset:0;
  pointer-events:none;
  mix-blend-mode:screen;
  background:
    repeating-linear-gradient(
      to right,
      rgba(255,0,0,0.12) 0px,
      rgba(0,0,0,0) 4px
    );
}

.content{
  position:absolute;
  inset:0;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  gap:35px;
  z-index:5;
}

.title{
  font-size:3rem;
  text-align:center;
  font-family: 'Impact', sans-serif;
  letter-spacing:2px;
  color:white;
  filter:
    drop-shadow(0 0 10px white)
    drop-shadow(0 0 40px red)
    drop-shadow(0 0 25px red);
  text-transform:uppercase;
}

.login-box{
  display:flex;
  flex-direction:column;
  gap:15px;
  width:80%;
  max-width:330px;
}

input{
  padding:12px 15px;
  font-size:1rem;
  border:none;
  outline:none;
  border-radius:6px;
  background:rgba(255,255,255,0.05);
  color:white;
  backdrop-filter:blur(4px);
  border:1px solid rgba(255,80,80,0.3);
}

input::placeholder{
  color:#ccc;
}

button{
  padding:10px 15px;
  border:none;
  border-radius:6px;
  background:rgb(255,80,80);
  color:white;
  font-weight:bold;
  transition:0.2s;
  text-transform:uppercase;
  letter-spacing:1px;
  box-shadow:0 0 15px rgba(255,0,0,0.5);
}

button:hover{
  background:red;
  box-shadow:0 0 25px rgba(255,0,0,0.8);
  transform:scale(1.04);
}

.error-message{
  color:#ff4d4d;
  font-size:0.9rem;
  text-align:center;
}
</style>

</head>
<body>

<div class="crt-container">
  
  <div class="content">
    <div class="title">One Simple Trick</div>

    <form method="POST" action="{{ route('login') }}" class="login-box">
      @csrf

      <input type="text" name="name" placeholder="Usuario" value="{{ old('name') }}">
      @error('name')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <input type="password" name="password" placeholder="Contraseña">
      @error('password')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <button type="submit">Entrar</button>

      @if(session('error'))
        <div class="error-message">{{ session('error') }}</div>
      @endif
    </form>
  </div>

  <div class="crt-noise"></div>
  <div class="scanlines"></div>
  <div class="crt-aberration"></div>

</div>

</body>
</html>
