<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<header class="py-6 px-10 flex items-center top-0 w-full justify-between">
    <div class="flex flex-grow basis-0">
        <svg class="h-6 w-32" viewBox="0 0 342 35" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0 .1a9.7 9.7 0 0 0 7 7h11l.5.1v27.6h6.8V7.3L26 7h11a9.8 9.8 0 0 0 7-7H0zm238.6 0h-6.8v34.8H263a9.7 9.7 0 0 0 6-6.8h-30.3V0zm-52.3 6.8c3.6-1 6.6-3.8 7.4-6.9l-38.1.1v20.6h31.1v7.2h-24.4a13.6 13.6 0 0 0-8.7 7h39.9v-21h-31.2v-7h24zm116.2 28h6.7v-14h24.6v14h6.7v-21h-38zM85.3 7h26a9.6 9.6 0 0 0 7.1-7H78.3a9.6 9.6 0 0 0 7 7zm0 13.8h26a9.6 9.6 0 0 0 7.1-7H78.3a9.6 9.6 0 0 0 7 7zm0 14.1h26a9.6 9.6 0 0 0 7.1-7H78.3a9.6 9.6 0 0 0 7 7zM308.5 7h26a9.6 9.6 0 0 0 7-7h-40a9.6 9.6 0 0 0 7 7z"
                fill="#FFF"
                data-darkreader-inline-fill=""
                style="--darkreader-inline-fill: currentColor;"></path></svg>
    </div>
    <nav>
        <ul class="text-white flex [&>li>a]:inline-block [&>li>a]:px-4 [&>li>a]:py-2">
            <li class="text-2xl font-Poppins"><a href="#">Contact Center <span class="font-Poppins text-blue-500 espectro font-bold">"Los Nachos"</span></a></li>
        </ul>
    </nav>

    <nav class="flex flex-grow basis-0 justify-end">
        <ul class="text-white flex [&>li>a]:inline-block [&>li>a]:px-4 [&>li>a]:py-2 [&>li>a]:text-2xl [&>li>a]:font-Poppins">
            <li><a class="hover:glow-shadow-green duration-500" href="../index.php">Añadir</a></li>
            <li><a class="hover:glow-shadow-yellow duration-500" href="./consult_page.php">Consultar</a></li>
        </ul>
    </nav>
</header>
<body>
    <div class="flex flex-col flex-grow basis-0 relative w-[50vh] my-auto mx-auto gap-4">
        <input class="flex w-[50vh] h-8 rounded-xl p-4" type="text" placeholder="Ingresa el nombre de quién desees consultar" id="search-input">
        <div class="hidden flex text-white border border-solid rounded-xl p-4 cursor-pointer" id="suggestions-container"></div>
    </div>
    <div class="p-10" id="user-details"></div>
</body>
</html>

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

<script>
    document.getElementById('search-input').addEventListener('input', function() {
        var query = this.value.trim();

        if (query !== '') {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', './suggestion.php?q=' + query, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('suggestions-container').classList.remove('hidden');
                    document.getElementById('suggestions-container').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        } else {
            document.getElementById('suggestions-container').classList.add('hidden');
            document.getElementById('suggestions-container').innerHTML = '';
        }
    });

    document.getElementById('suggestions-container').addEventListener('click', function(e) {
        if (e.target.tagName === 'DIV') {
            var selectedUser = e.target.textContent;
            var nameParts = selectedUser.split(" ");
            showUserInfo(nameParts[0], nameParts[1]); // Envía el nombre y el apellido por separado
        }
    });

    function showUserInfo(name, lastName) {
        var xhrDetails = new XMLHttpRequest();
        xhrDetails.open('GET', './user_details.php?name=' + name + '&last_name=' + lastName, true);
        xhrDetails.onreadystatechange = function() {
            if (xhrDetails.readyState == 4 && xhrDetails.status == 200) {
                document.getElementById('user-details').innerHTML = xhrDetails.responseText;
            }
        };
        xhrDetails.send();
    }

    document.getElementById('user-details').addEventListener('click', function(e) {
        // Verificar si se hizo clic en el botón "Borrar"
        if (e.target.classList.contains('delete-user')) {
            var confirmation = confirm("¿Estás seguro de que deseas eliminar este usuario?");
            if (confirmation) {
                // Obtener el nombre y apellido del usuario
                var name = document.getElementById('user-name').textContent;
                var lastName = document.getElementById('user-last-name').textContent;

                // Llamar a la función para eliminar al usuario
                deleteUserInfo(name, lastName);
            }
        }
    });

    function deleteUserInfo(name, lastName) {
        var xhrDelete = new XMLHttpRequest();
        xhrDelete.open('GET', './delete_user.php?name=' + name + '&last_name=' + lastName, true);
        xhrDelete.onreadystatechange = function() {
            if (xhrDelete.readyState == 4 && xhrDelete.status == 200) {
                // Mostrar el resultado de la eliminación
                alert(xhrDelete.responseText);

                // Limpiar el contenedor de detalles del usuario
                document.getElementById('user-details').innerHTML = '';
                document.getElementById('suggestions-container').classList.add('hidden');
                document.getElementById('search-input').value = '';

            }
        };
        xhrDelete.send();
    }
</script>

