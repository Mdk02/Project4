
function idelVer1(id_product, img_url, name_product, rating,
    new_price, old_price, description) {

        
        

    document.getElementById("img-quick").src = img_url;
    document.getElementById("product-name-quick").innerHTML = name_product;

    document.getElementById("new-price-quick").innerHTML = new_price;
    document.getElementById("old-price-quick").innerHTML = old_price;
    document.getElementById("quick-desc").innerHTML = description;
};

function addToCart(elem){
    document.cookie = "product" + elem.id + "=" + elem.id;
}

function idelVer2() {

    alert(  "<div role=\"tabpanel\" id=\"sheet\" class=\"product__tab__content fade\">"+
    "<div class=\"pro__feature\">"+
        "<h2 class=\"title__6\">Data sheet</h2>" +
        "<ul class=\"feature__list\">" +
            "<?" +
            "$queryChars = 'select сharacteristic.NameСharacteristic, product_properties.Value from product_properties join сharacteristic"+
             "on сharacteristic.IdСharacteristic = product_properties.IdCharacteristic"+
              "where idproduct = ' . $q[3] . '';"+
            "$resultChars = mysqli_query($db, $queryChars);"+
            "while ($q = mysqli_fetch_array($resultChars)) {"+
                "if ($q[0] != 'img') {"+
            "?><li><i class=\"zmdi zmdi-play-circle\"></i><?= $q[0] ?> : <?= $q[1] ?></li><?"+
             "                                                                               }"+
                                                                                        "}"+
                                                                                                "?>"+
        "</ul>"+
    "</div>"+
"</div>");
    document.getElementById("quick-desc").innerHTML =   
        "<div role=\"tabpanel\" id=\"sheet\" class=\"product__tab__content fade\">"+
                                    "<div class=\"pro__feature\">"+
                                        "<h2 class=\"title__6\">Data sheet</h2>" +
                                        "<ul class=\"feature__list\">" +
                                            "<?queryChars = 'select сharacteristic.NameСharacteristic, product_properties.Value from product_properties join сharacteristic"+
                                             "on сharacteristic.IdСharacteristic = product_properties.IdCharacteristic"+
                                              "where idproduct = ' . $q[3] . '';"+
                                            "$resultChars = mysqli_query($db, $queryChars);"+
                                            "while ($q = mysqli_fetch_array($resultChars)) {"+
                                                "if ($q[0] != 'img') {"+
                                            "?><li><i class=\"zmdi zmdi-play-circle\"></i><?= $q[0] ?> : <?= $q[1] ?></li><?"+
                                             "                                                                               }"+
                                                                                                                        "}"+
                                                                                                                                "?>"+
                                        "</ul>"+
                                    "</div>"+
                                "</div>"
    ;
    



}


{/* <div role="tabpanel" id="sheet" class="product__tab__content fade">
                                    <div class="pro__feature">
                                        <h2 class="title__6">Data sheet</h2>
                                        <ul class="feature__list">
                                            <?
                                            $queryChars = 'select сharacteristic.NameСharacteristic, product_properties.Value from product_properties join сharacteristic
                                             on сharacteristic.IdСharacteristic = product_properties.IdCharacteristic
                                              where idproduct = ' . $q[3] . '';
                                            $resultChars = mysqli_query($db, $queryChars);
                                            while ($q = mysqli_fetch_array($resultChars)) {
                                                if ($q[0] != 'img') {
                                            ?><li><i class="zmdi zmdi-play-circle"></i><?= $q[0] ?> : <?= $q[1] ?></li><?
                                                                                                                            }
                                                                                                                        }
                                                                                                                                ?>
                                        </ul>
                                    </div>
                                </div> */}