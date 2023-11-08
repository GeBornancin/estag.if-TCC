<style>
   
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
        width: 300px; 
        height: 300px;
        align-items: center;
        display: flex; 
        /* justify-content: center;  */
        align-items: center; 
        flex-direction: column; 
        background-color: #ffffff; 
        border-radius: 10px; 
    }
    .card-header {
        background-color: #9BFFA5;
        width: 300px;
        align-items: center; 
        display: flex; 
        justify-content: center; 
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">
            {{$vaga->tituloVaga}}
        </div>
    </div>
</div>
