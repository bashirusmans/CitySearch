var citylist = document.getElementById('city_list');
var city = document.getElementById('city');
var cities = JSON.parse(document.getElementById('cities').innerHTML);
var filteredlist;

if(city){
    city.addEventListener('input',function(){
        filter(this.value);
        citylist.innerHTML = "";
        hide.classList.add('hide');
        filteredlist.forEach(x => {
            var a = document.createElement('a');
            var newdiv = document.createElement('div');
            a.innerHTML = x;
            a.id = x;
            a.href = x;
            newdiv.classList.add('d-flex');
            newdiv.classList.add('justify-content-center');
            a.classList.add('small-title');
            a.classList.add('link')
            newdiv.appendChild(a)
            citylist.appendChild(newdiv)
            newdiv.appendChild(document.createElement('br'));
            hide.classList.remove('hide');
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

var hide = document.getElementById('hide');