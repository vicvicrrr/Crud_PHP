function mostrar(){
    var inputSenha = document.getElementById('input_senha');
    var btnShowPass = document.getElementById('btn_eye');

    if(inputSenha.type === 'password'){
        inputSenha.setAttribute('type', 'text');
        btnShowPass.classList.replace('bi-eye', 'bi-eye-slash')
    }else{
        inputSenha.setAttribute('type', 'password');
        btnShowPass.classList.replace('bi-eye-slash', 'bi-eye')
    }
}