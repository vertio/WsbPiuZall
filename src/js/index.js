const country = document.querySelectorAll(".exchange_select select");
for (let i = 0; i < country.length; i++){
    for(cur_code in country){
        console.log(cur_code)
    }
}
