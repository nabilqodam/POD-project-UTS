function login(){
    

    if(username !== 'a' && pw !== '1'){
        alert('Anda harus mengisi data')
        return
    }
    window.open("./database/card/list_card.php")
}