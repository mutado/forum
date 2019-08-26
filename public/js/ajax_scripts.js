var categories;

function loadCategories(size)
{
    var req = new XMLHttpRequest();
    req.open('GET',"src/api/categories.php?size="+size,true);
    req.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    req.onreadystatechange = function () {
        if (req.readyState === 4 & req.status === 200){
            categories=JSON.parse(req.responseText);
    showCategories();
        }
    }
    req.send();
}

function showCategories() {
    console.log(categories);
    
    categories.forEach(element => {
        var category = document.createElement('div');
        category.classList.add('card');
        category.innerHTML += "<h2>"+element.name+"</h2><p>"+element.description+"</p>"
        document.querySelector('.categories').appendChild(category);
    });

    // document.querySelector('.categories').classList.remove('hidden');
}

document.addEventListener('DOMContentLoaded',function(){
    loadCategories(20);
});