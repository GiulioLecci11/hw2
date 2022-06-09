function onJsonUsers(json)
{
    const lista = document.querySelector("#users");
    lista.innerHTML = '';
    for(user of json)
    {
        const li = document.createElement("li");
        li.classList.add("table-row");
        const usern = document.createElement("div");
        usern.classList.add("col");
        usern.classList.add("col-1");
        usern.textContent = user.username;
        const email = document.createElement("div");
        email.classList.add("col");
        email.classList.add("col-2");
        email.textContent = user.email;
        const npost = document.createElement("div");
        npost.classList.add("col");
        npost.classList.add("col-3");
        npost.textContent = user.postnumber;
        const aggiungiPref = document.createElement("a");
        aggiungiPref.classList.add("col");
        aggiungiPref.classList.add("col-4");
        aggiungiPref.href = '#';
        aggiungiPref.dataset.id_user = user.id;
        aggiungiPref.textContent = "Aggiungi ai preferiti";
        aggiungiPref.classList.add("small");
        aggiungiPref.addEventListener("click", Preferred);
        li.appendChild(usern);
        li.appendChild(email);
        li.appendChild(npost);
        li.appendChild(aggiungiPref);
        lista.appendChild(li);
    }
}
function onJsonPrefe(json)
{
    const lista = document.querySelector("#prefe");
    lista.innerHTML = '';
    for(user of json)
    {
        const li = document.createElement("li");
        li.classList.add("table-row");
        const usern = document.createElement("div");
        usern.classList.add("col");
        usern.classList.add("col-1");
        usern.textContent = user.username;
        const email = document.createElement("div");
        email.classList.add("col");
        email.classList.add("col-2");
        email.textContent = user.email;
        const npost = document.createElement("div");
        npost.classList.add("col");
        npost.classList.add("col-3");
        npost.textContent = user.postnumber;
        const rimuoviPref = document.createElement("a");
        rimuoviPref.classList.add("col");
        rimuoviPref.classList.add("col-4");
        rimuoviPref.href = '#';
        rimuoviPref.dataset.id_user = user.id;
        rimuoviPref.textContent = "Rimuovi dai preferiti";
        rimuoviPref.classList.add("small");
        rimuoviPref.addEventListener("click", Unpreferred);
        li.appendChild(usern);
        li.appendChild(email);
        li.appendChild(npost);
        li.appendChild(rimuoviPref);
        lista.appendChild(li);
    }
}
        

function Unpreferred(event){
    const id_user = event.currentTarget.dataset.id_user;
    fetch(BASE_URL+"/removePref/" + id_user).then(showPrefe);
    event.preventDefault();
}

function Preferred(event){
    const id_user = event.currentTarget.dataset.id_user;
    fetch(BASE_URL+"/addPref/" + id_user).then(showPrefe);
    event.preventDefault();
}
function responseUsers(response)
{
    return response.json();
}
function responsePrefe(response)
{
    return response.json();
}
function showUsers(){
    fetch(BASE_URL+"/getUser").then(responseUsers).then(onJsonUsers);
}
function showPrefe(){
    fetch(BASE_URL+"/getPref").then(responsePrefe).then(onJsonPrefe);
}

function showStats(){
    fetch(BASE_URL+"/getStats").then(responseStats).then(onJsonStats);
}

function onJsonStats(json){
    console.log(json);
    const profile=document.getElementById("profile");
    profile.innerHTML="";
    const avatar= document.createElement('div');
    avatar.classList.add("avatar");
    avatar.style="background-image: url("+json[0].url+")";
    const mini=document.createElement("img");
    mini.classList.add("mini");
    mini.src=json[0].url;
    const usern=document.createElement('div');
    usern.classList.add("username");
    usern.textContent="@"+json[0].usern;
    const stats=document.createElement('div');
    stats.classList.add("stats");
    const cont=document.createElement("div");
    const br=document.createElement('br');
    cont.textContent="Post"
    const count=document.createElement("span");
    count.classList.add("count");
    count.textContent=json[0].postnumber;
    profile.appendChild(avatar);
    profile.appendChild(usern);
    profile.appendChild(stats);
    profile.appendChild(mini);
    stats.appendChild(cont);
    cont.appendChild(br);
    cont.appendChild(count);
}
function responseStats(response)
{
    return response.json();
}
showStats();
showUsers();
showPrefe();

//menù mobile

const show_menu= document.querySelector('#show_menu');
const menu = document.querySelector('#menu');
menu.addEventListener('click',showMenu);
show_menu.querySelector('div').addEventListener('click',closeMenu);

function showMenu(event){
    event.currentTarget.classList.add('hidden');
    show_menu.classList.remove('hidden');
    show_menu.classList.add('show_menu');
}

function closeMenu(event){
    show_menu.classList.remove('show_menu');
    show_menu.classList.add('hidden');
    menu.classList.remove('hidden');
    
}