<?php include('includes/code.php') ?>
<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <title>Desafio - Toogas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <!--Personal CSS-->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Desafio - Toogas</a>
            </div>
        </nav>
    </header>
    <br>
    <div class="container">
        <table class="table table-striped">
            <thead class="thead-light  ">
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <!-- FOREACH Loop to search through the data for the items -->
                <?php foreach ($json1->items as $item) {
                    $name = $item->name;
                    $name = ucwords($name);
                    $price = $item->price;
                    $price = sprintf('%0.2f', $price);
                    $image = "";

                    //FOREACH Loop to search through the items for the attribute image 
                    foreach ($item->custom_attributes as $attr) {
                        if ($attr->attribute_code === "image") {
                            $image = $attr->value;
                        }
                    }

                    //Sets up a new product with the data retrieved
                    $prod = new Produto();
                    $prod->set_name($name);
                    $prod->set_price($price);
                    $prod->set_image($image);

                    //Echoes to fill the table
                    echo "<tr>";

                    echo "<td>
                        <img src='{$prod->get_image()}' style='height: 50px; margin: 2px;'>
                       </td>";
                    echo "<td>{$prod->get_name()}</td>";

                    if ($prod->get_price() >= 500) {
                        echo "<td>
                                <span class='old_price text-muted'>{$prod->get_price()} €  </span>
                                <span class='new_price'>{$prod->promo($prod->get_price())} €</span>
                              </td>";
                    } else {
                        echo "<td>{$prod->get_price()} €</td>";
                    }
                    echo "</tr>";
                } ?>
            </tbody>
        </table>
        <form method="POST">
            <lable for="combo">Order By:</lable>
            <select name="combo" onchange="this.form.submit()">
                <option value="default" <?php if ($opt == 'default') echo " selected"; ?>>Default</option>
                <option value="price_asc" <?php if ($opt == "price_asc") echo " selected"; ?>>Price Asc</option>
                <option value="price_desc" <?php if ($opt == "price_desc") echo " selected"; ?>>Price Desc</option>
                <option value="name_asc" <?php if ($opt == "name_asc") echo " selected"; ?>>Name Asc</option>
                <option value="name_desc" <?php if ($opt == "name_desc") echo " selected"; ?>>Name Desc</option>
            </select>
        </form>
        
    </div>

    </body>

</html>