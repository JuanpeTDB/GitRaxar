function error() {
    const box = document.getElementById('box');
    const fail = document.getElementById('msj_error');
    const msj = document.createElement('h4');
    msj.textContent = "Usuario y/o contraseña incorrecta";
    fail.appendChild(msj);
}
error();