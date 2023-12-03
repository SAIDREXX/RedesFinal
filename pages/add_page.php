<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>¡Bienvenido!</title>
</head>
</html>
<script>
document.addEventListener("DOMContentLoaded", () => {
    var inputFile = document.getElementById("inputFile");
    var spanFile = document.getElementById("spanFile");

    if (spanFile && inputFile) {
      spanFile.addEventListener("click", function () {
        if (inputFile) {
          inputFile.click();
        }
      });
    }
  });
</script>
    <body>
    <style>
    html {
        font-family: Poppins, system-ui, sans-serif;
        background: #13151a;
        background-size: 224px;
    }
    .hover\:glow-shadow-green:hover {
    text-shadow: 0 0 5px #03f484, 0 0 25px #03f484, 0 0 50px #03f484, 0 0 100px #03f484;
    }
    .hover\:glow-shadow-yellow:hover {
    text-shadow: 0 0 5px #dcf403, 0 0 25px #dcf403, 0 0 50px #dcf403, 0 0 100px #dcf403;
    }
    .hover\:glow-shadow-red:hover {
    text-shadow: 0 0 5px #f42703, 0 0 25px #f42703, 0 0 50px #f42703, 0 0 100px #f42703;
    }

    .hover\:glow-shadow-blue:hover {
    text-shadow: 0 0 5px #03b8f4, 0 0 25px #03b8f4, 0 0 50px #03b8f4, 0 0 100px #03b8f4;
    }
    @keyframes rotateHue {
    0% {
        filter: hue-rotate(0deg);
    }
    100% {
        filter: hue-rotate(360deg);
    }
    }

    .espectro {
    animation: rotateHue 10s linear infinite;
    }
    </style>
    <main>
        <header
        class="py-6 px-10 flex items-center top-0 w-full justify-between"
        >
        <div class="flex flex-grow basis-0">
            <svg
            class="h-6 w-32"
            viewBox="0 0 342 35"
            xmlns="http://www.w3.org/2000/svg"
            ><path
                d="M0 .1a9.7 9.7 0 0 0 7 7h11l.5.1v27.6h6.8V7.3L26 7h11a9.8 9.8 0 0 0 7-7H0zm238.6 0h-6.8v34.8H263a9.7 9.7 0 0 0 6-6.8h-30.3V0zm-52.3 6.8c3.6-1 6.6-3.8 7.4-6.9l-38.1.1v20.6h31.1v7.2h-24.4a13.6 13.6 0 0 0-8.7 7h39.9v-21h-31.2v-7h24zm116.2 28h6.7v-14h24.6v14h6.7v-21h-38zM85.3 7h26a9.6 9.6 0 0 0 7.1-7H78.3a9.6 9.6 0 0 0 7 7zm0 13.8h26a9.6 9.6 0 0 0 7.1-7H78.3a9.6 9.6 0 0 0 7 7zm0 14.1h26a9.6 9.6 0 0 0 7.1-7H78.3a9.6 9.6 0 0 0 7 7zM308.5 7h26a9.6 9.6 0 0 0 7-7h-40a9.6 9.6 0 0 0 7 7z"
                fill="#FFF"
                data-darkreader-inline-fill=""
                style="--darkreader-inline-fill: currentColor;"></path></svg 
            >
        </div>

        <nav>
            <ul
            class="text-white flex [&>li>a]:inline-block [&>li>a]:px-4 [&>li>a]:py-2"
            >
            <li class="text-2xl font-Poppins"><a href="#">Contact Center <span class="font-Poppins text-blue-500 espectro font-bold">"Los Nachos"</span></a></li>
            </ul>
        </nav>

        <nav class="flex flex-grow basis-0 justify-end">
            <ul
            class="text-white flex [&>li>a]:inline-block [&>li>a]:px-4 [&>li>a]:py-2 [&>li>a]:text-2xl [&>li>a]:font-Poppins "
            >
            <li><a class="hover:glow-shadow-green duration-500" href="./add_page.php">Añadir</a></li>
            <li><a class="hover:glow-shadow-yellow duration-500" href="./consult_page.php">Consultar</a></li>
            
            </ul>
        </nav>
        </header>
        <section>
        <div class="overflow-auto flex flex-grow basis-0 relative w-[440px] h-[550px] my-[2%] mx-auto bg-black/25
                    border-white border rounded-md shadow-md shadow-black/10 text-center flex-col">
            <h2 class="flex p-4 mx-auto text-2xl mb-4 font-Poppins text-white">Registro de Usuario</h2>

            <form action="../api/add_user.php" method="POST" enctype="multipart/form-data">
            <div class="flex flex-row px-4 py-1 justify-between items-center">
                <label for="file" class="text-[#009dd1] font-Poppins">Foto de Perfil</label>
                <span id="spanFile" class="text-white border rounded-sm p-1 duration-500 hover:glow-shadow-blue cursor-pointer">Seleccionar</span>
                <input type="file" name="picture" accept="image/*" id="inputFile" class="hidden">
            </div>
            <!---Nombre-->
            <div class="flex flex-row px-4 py-2 justify-between items-center">
                <label for="name" class="flex flex-grow basis-0 text-[#009dd1] font-Poppins">Nombre</label>            
                <input type="text" name="name" class="w-50 border rounded-sm p-1 font-Poppins" placeholder="Nombre">
            </div>
            <!---Apellidos-->
            <div class="flex flex-row px-4 py-2 justify-between items-center">
                <label for="lastName" class="flex flex-grow basis-0 text-[#009dd1] font-Poppins">Apellidos</label>
                <input type="text" name="lastName" class="w-50 border rounded-sm p-1 font-Poppins" placeholder="Apellidos">
            </div>
            <!---Domicilio-->  
            <div class="flex flex-row px-4 py-2 justify-between items-center">
                <label for="home" class="flex flex-grow basis-0 text-[#009dd1] font-Poppins">Domicilio</label>
                <input type="text" name="home" class="w-50 border rounded-sm p-1 font-Poppins" placeholder="Domicilio">
            </div>
            <!---Número Telefónico-->
            <div class="flex flex-row px-4 py-2 justify-between items-center">
                <label for="phone" class="flex flex-grow basis-0 text-[#009dd1] font-Poppins">Teléfono</label>
                <input type="text" name="phone" class="w-50 border rounded-sm p-1 font-Poppins" placeholder="Teléfono">
            </div>
            <!---CURP-->
            <div class="flex flex-row px-4 py-2 justify-between items-center">
                <label for="curp" class="flex flex-grow basis-0 text-[#009dd1] font-Poppins">CURP</label>
                <input type="text" name="curp" class="w-50 border rounded-sm p-1 font-Poppins" placeholder="CURP">
            </div>
            <!---Edad-->
            <div class="flex flex-row px-4 py-2 justify-between items-center">
                <label for="age" class="flex flex-grow basis-0 text-[#009dd1] font-Poppins">Edad</label>
                <input type="text" name="age" class="w-50 border rounded-sm p-1 font-Poppins" placeholder="Edad">
            </div>
            <!---Nivel Académico-->
            <div class="flex flex-row px-4 py-2 justify-between items-center">
                <label for="studyLevel" class="flex flex-grow basis-0 text-[#009dd1] font-Poppins">Nivel de Estudios</label>
                <input type="text" name="studyLevel" class="w-50 border rounded-sm p-1 font-Poppins" placeholder="Nivel de Estudios">
            </div>
            <!---Submit Button-->
            <div class="py-4">
                <button type="submit" name="sendForm" class="border border-white p-2 rounded-sm text-white duration-500 ease-in-out hover:bg-[#009dd1]">Registrarse</button>
            </div>
            </form>
        </div>
        </section>
    </main>
    </body>
</html>

