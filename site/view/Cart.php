<?php
include "../Model/Cart_Model.php";
include "../config/DB.php";
$duongda_cart=new Cart_Model();
$duongda_cart->get_Cart();
?>
<HTML>
<HEAD>
    <TITLE></TITLE>
    <style>
    body{width:610px;font-family:calibri;}
    #shopping-cart table{width:100%;background-color:#F0F0F0;}
    #shopping-cart table td{background-color:#FFFFFF;}

    .txt-heading{    
        padding: 10px 10px;
        border-radius: 2px;
        color: #FFF;
        background: #6aadf1;
        margin-bottom:10px;
    }
    a.btnRemoveAction{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}
    a.btnRemoveAction:visited{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}

    #btnEmpty {
        background-color: #ffffff;
        border: #FFF 1px solid;
        padding: 1px 10px;
        color: #ff0000;
        font-size: 0.8em;
        float: right;
        text-decoration: none;
        border-radius: 4px;
    }
    .btnAddAction{    background-color: #eb9e4f;
        border: 0;
        padding: 3px 10px;
        color: #ffffff;
        margin-left: 2px;
        border-radius: 2px;
    }
    #shopping-cart {margin-bottom:30px;}
    .cart-item {border-bottom: #79b946 1px dotted;padding: 10px;}
    #product-grid {margin-bottom:30px;}
    .product-item {	float:left;	background: #ffffff;margin:15px 10px;	padding:5px;border:#CCC 1px solid;border-radius:4px;}
    .product-item div{text-align:center;	margin:10px;}
    .product-price {    
        color: #005dbb;
        font-weight: 600;
    }
    .product-image {height:100px;background-color:#FFF;}
    .clear-float{clear:both;}
    .demo-input-box{border-radius:2px;border:#CCC 1px solid;padding:2px 1px;}
</style>
</HEAD>
<BODY>
    <div id="shopping-cart">
        <div class="txt-heading">Shopping Cart <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a></div>
        <?php
        if(isset($_SESSION["cart_item"])){
            $item_total = 0;
            ?>	
            <table cellpadding="10" cellspacing="1">
                <tbody>
                    <tr>
                        <th style="text-align:left;"><strong>Name</strong></th>
                        <!-- <th style="text-align:left;"><strong>ID</strong></th> -->
                        <th style="text-align:right;"><strong>Quantity</strong></th>
                        <th style="text-align:right;"><strong>Price</strong></th>
                        <th style="text-align:center;"><strong>Action</strong></th>
                    </tr>	
                    <?php		
                    foreach ($_SESSION["cart_item"] as $item){
                       ?>
                       <tr>
                         <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
                         <!-- <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["ID"]; ?></td> -->
                         <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                         <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["price"]; ?></td>
                         <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="cart.php?action=remove&ID=<?php echo $item["name"]; ?>" class="btnRemoveAction">Remove Item</a></td>
                     </tr>
                     <?php
                     $item_total += ($item["price"]*$item["quantity"]);
                 }
                 ?>

                 <tr>
                    <td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total; ?></td>
                </tr>
            </tbody>
        </table>		
        <?php
    }
    ?>
</div>
<form method="post" action="cart.php?action=checkout">
    <div class="checkout" >
    <input type="submit" value="Thanh Toán"></a>
    </div>
</div>
</form>

</BODY>
</HTML>