var citylist = document.getElementById('city_list');
var city = document.getElementById('city');
var cities = JSON.parse(document.getElementById('cities').innerHTML);
var filteredlist;

if(city){
    city.addEventListener('input',function(){
        filter(this.value);
        citylist.innerHTML = "";
        filteredlist.forEach(x => {
            var a = document.createElement('a');
            a.innerHTML = x;
            a.id = x;
            a.href = x;
            citylist.appendChild(a)
            citylist.appendChild(document.createElement('br'));
        });
    })
}
var new_cities = cities.filter(value => value !== null);

function filter(letter){
    if(letter == ""){
        filteredlist=[];
        return;
    }
    filteredlist = [];
    new_cities.forEach(x => {
        var y = x.toLowerCase();
        if(y.startsWith(letter) | x.startsWith(letter)){
            filteredlist.push(x);
        }
    });
}