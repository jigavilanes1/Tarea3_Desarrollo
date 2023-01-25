function Guardar() {
    let nombre = document.querySelector("#nombre").value;
    let precio = document.querySelector("#precio").value;
    let marca = document.querySelector("#marca").value;
    let foto = document.querySelector("#foto").value;
    let res = document.querySelector("#res");

    let xhr = new XMLHttpRequest();

    xhr.open("POST","Logica/Logica.php",true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    
    let data = JSON.stringify({"nombre":nombre,"precio":precio,"marca":marca,"foto":foto,"operacion":"Guardar"});

    xhr.send(data);
    window.location.replace("index.php");
}

function BuscarTodos() {
    let datos = document.querySelector("#datos");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","Logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            datos.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"operacion":"BuscarTodos"});

    xhr.send(data);
}

function Eliminar(id) {
    let res = document.querySelector("#res");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","Logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"id":id,"operacion":"Eliminar"});

    xhr.send(data);
    window.location.replace("index.php");
}

function Editar(id) {    
    let form = document.querySelector("#formulario");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","Logica/Logica.php",true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            form.innerHTML = this.responseText;
        }
    }
    let data = JSON.stringify({"id":id,"operacion":"Editar"});

    xhr.send(data);   
}

function Actualizar(id) {
    let nombre = document.querySelector("#nombre").value;
    let precio = document.querySelector("#precio").value;
    let marca = document.querySelector("#marca").value;
    let foto = document.querySelector("#foto").value;
    let res = document.querySelector("#res");

    let xhr = new XMLHttpRequest();

    xhr.open("POST","Logica/Logica.php",true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            res.innerHTML = this.responseText;
        }
    }
    
    let data = JSON.stringify({"id":id,"nombre":nombre,"precio":precio,"marca":marca,"foto":foto,"operacion":"Actualizar"});

    xhr.send(data);
}