
function idelVer1( id_product, img_url, name_product,rating ,
     new_price , old_price ,description){
    
    document.getElementById("img-quick").src =  img_url;
    document.getElementById("product-name-quick").innerHTML = name_product;

    document.getElementById("new-price-quick").innerHTML = new_price;
    document.getElementById("old-price-quick").innerHTML = old_price;
    document.getElementById("quick-desc").innerHTML = description;
};


