<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API - Pruebas</title>
    <link rel="stylesheet" href="assets/estilo.css" type="text/css">
</head>
<body>

<div class="container">
    <h1>API de pruebas</h1>

    <!-- Sección de autenticación -->
    <div class="divbody">
        <h3>Auth - login</h3>
        <code>
           POST  /auth
           <br>
           {
               <br>
               "usuario" :"",  -> REQUERIDO
               <br>
               "password": "" -> REQUERIDO
               <br>
            }        
        </code>
    </div> 

    <!-- Sección de operaciones con pacientes -->
    <div class="divbody">   
        <h3>Pacientes</h3>

        <!-- Obtener lista de pacientes -->
        <code>
           GET  /pacientes?page=$numeroPagina
           <br>
           GET  /pacientes?id=$idPaciente
        </code>

        <!-- Crear un nuevo paciente -->
        <code>
           POST  /pacientes
           <br> 
           {
            <br> 
               "nombre" : "", -> REQUERIDO
               <br> 
               "dni" : "",    -> REQUERIDO
               <br> 
               "correo":"",   -> REQUERIDO
               <br> 
               "codigoPostal" :"",             
               <br>  
               "genero" : "",        
               <br>        
               "telefono" : "",       
               <br>       
               "fechaNacimiento" : "",      
               <br>         
               "token" : ""   -> REQUERIDO        
               <br>       
           }
        </code>

        <!-- Actualizar un paciente existente -->
        <code>
           PUT  /pacientes
           <br> 
           {
            <br> 
               "nombre" : "",               
               <br> 
               "dni" : "",                  
               <br> 
               "correo":"",                 
               <br> 
               "codigoPostal" :"",             
               <br>  
               "genero" : "",        
               <br>        
               "telefono" : "",       
               <br>       
               "fechaNacimiento" : "",      
               <br>         
               "token" : "" ,                -> REQUERIDO        
               <br>       
               "pacienteId" : ""   -> REQUERIDO
               <br>
           }
        </code>

        <!-- Eliminar un paciente -->
        <code>
           DELETE  /pacientes
           <br> 
           {   
               <br>    
               "token" : "",       -> REQUERIDO        
               <br>       
               "pacienteId" : ""   -> REQUERIDO
               <br>
           }
        </code>
    </div>
</div>
</body>
</html>
