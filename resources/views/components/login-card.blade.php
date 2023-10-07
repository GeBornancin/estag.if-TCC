<style>
    .body{
        margin: 0;
        padding: 0;
    }
    .container{
        display: flex; 
        margin: 0 auto;
        justify-content: center; 
        align-items: center; 
        width: 400px; 
        position: absolute;
        top: 100px; 
        left: 800px; 
        max-width: 700px;
        
        
    }

    .card{
        width: 500px; 
        height: 500px;
        align-items: center;
        display: flex; 
        justify-content: center; 
        align-items: center; 
        flex-direction: column; 
        background-color: #ffffff; 
        border-radius: 10px; 
    }
    .btn{
        margin-top:50px; 
        width:300px; 
        background-color:#359830; 
        color:rgb(255, 255, 255);
    }
</style>
    
<div class="container">
    <div class="card">

        <h1 class="card-title" style="font-size:50px; color:#359830;">Autenticar-se</h1>

        @if (Route::has('login'))

            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn"
                   >Entrar</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn"
                        >Registrar-se</a>
                @endif
            @endauth

        @endif

    </div>
</div>
